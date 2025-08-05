<?php
// app/Http/Controllers/PermissionAssignmentController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth; // Explicitly import Auth
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Illuminate\Http\RedirectResponse;

class PermissionAssignmentController extends Controller
{
    public function index(): RedirectResponse
    {
        Log::info('PermissionAssignmentController::index - Redirecting to assign');
        return Redirect::route('permission-assignments.assign');
    }

    public function assign(Request $request): View|RedirectResponse
    {
        Log::info('PermissionAssignmentController::assign - Method called', [
            'method' => $request->method(),
            'input' => $request->all()
        ]);

        // Ensure user is authenticated
        $user = Auth::user();
        if (!$user) {
            Log::error('PermissionAssignmentController::assign - No authenticated user found');
            return Redirect::route('permission-assignments.index')->with('error', 'You must be logged in to assign permissions.');
        }

        $accountId = $user->account_id ?? 1;
        $roles = Bouncer::role()->where('scope', $accountId)->paginate(15);
        $selectedRole = null;
        $assignedPermissions = collect([]);
        $permissions = Bouncer::ability()->where('scope', $accountId)->paginate(15);

        if ($request->has('role_id')) {
            $validated = $request->validate([
                'role_id' => ['required', 'exists:roles,id'],
            ]);
            $selectedRole = Bouncer::role()->findOrFail($validated['role_id']);
            Bouncer::scope()->to($selectedRole->scope);
            $assignedPermissions = Bouncer::ability()->whereIn('id', DB::table('permissions')
                ->where('entity_id', $selectedRole->id)
                ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                ->where('scope', $selectedRole->scope)
                ->pluck('ability_id'))->get();

            Log::info('PermissionAssignmentController::assign - Loaded role and permissions', [
                'role_id' => $selectedRole->id,
                'role_name' => $selectedRole->name,
                'scope' => $selectedRole->scope,
                'permission_count' => $assignedPermissions->count(),
                'permissions' => $assignedPermissions->pluck('name')->toArray()
            ]);
        }

        if ($request->isMethod('post')) {
            Log::info('PermissionAssignmentController::assign - Processing POST request', [
                'input' => $request->all()
            ]);

            $validated = $request->validate([
                'role_id' => ['required', 'exists:roles,id'],
                'permission_ids' => ['nullable', 'array'],
                'permission_ids.*' => ['exists:abilities,id'],
            ]);

            $role = Bouncer::role()->findOrFail($validated['role_id']);
            Bouncer::scope()->to($role->scope);

            DB::beginTransaction();
            try {
                // Revoke existing permissions
                $existingPermissions = Bouncer::ability()->whereIn('id', DB::table('permissions')
                    ->where('entity_id', $role->id)
                    ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                    ->where('scope', $role->scope)
                    ->pluck('ability_id'))->get();

                foreach ($existingPermissions as $permission) {
                    Bouncer::disallow($role->name)->to($permission->name);
                    Log::info('PermissionAssignmentController::assign - Revoked existing permission', [
                        'role_id' => $role->id,
                        'permission_id' => $permission->id,
                        'permission_name' => $permission->name
                    ]);
                }

                // Assign new permissions
                if (!empty($validated['permission_ids'])) {
                    foreach ($validated['permission_ids'] as $permissionId) {
                        $permission = Bouncer::ability()->findOrFail($permissionId);
                        if ($permission->scope === $role->scope) {
                            Bouncer::allow($role->name)->to($permission->name);
                            Log::info('PermissionAssignmentController::assign - Assigned permission', [
                                'role_id' => $role->id,
                                'permission_id' => $permission->id,
                                'permission_name' => $permission->name
                            ]);

                            // Verify insertion in permissions table
                            $permissionRecord = DB::table('permissions')
                                ->where('ability_id', $permission->id)
                                ->where('entity_id', $role->id)
                                ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                                ->where('scope', $role->scope)
                                ->first();
                            if ($permissionRecord) {
                                Log::info('PermissionAssignmentController::assign - Permission record created', [
                                    'permission_record_id' => $permissionRecord->id
                                ]);
                            } else {
                                Log::warning('PermissionAssignmentController::assign - Permission record not found after assignment', [
                                    'role_id' => $role->id,
                                    'permission_id' => $permission->id
                                ]);
                            }
                        } else {
                            Log::warning('PermissionAssignmentController::assign - Scope mismatch', [
                                'role_id' => $role->id,
                                'permission_id' => $permission->id,
                                'role_scope' => $role->scope,
                                'permission_scope' => $permission->scope
                            ]);
                        }
                    }
                }

                DB::commit();
                Log::info('PermissionAssignmentController::assign - Transaction committed');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('PermissionAssignmentController::assign - Transaction failed', [
                    'error' => $e->getMessage(),
                    'stack' => $e->getTraceAsString()
                ]);
                return Redirect::route('permission-assignments.assign', ['role_id' => $role->id])
                    ->with('error', 'Failed to assign permissions: ' . $e->getMessage());
            }

            return Redirect::route('permission-assignments.assign', ['role_id' => $role->id])
                ->with('status', 'permissions-assigned');
        }

        return view('permission-assignments.assign', compact('roles', 'permissions', 'selectedRole', 'assignedPermissions'));
    }

    public function revoke(Request $request): RedirectResponse
    {
        Log::info('PermissionAssignmentController::revoke - Processing revoke request', [
            'input' => $request->all()
        ]);

        $user = Auth::user();
        if (!$user) {
            Log::error('PermissionAssignmentController::revoke - No authenticated user found');
            return Redirect::route('permission-assignments.index')->with('error', 'You must be logged in to revoke permissions.');
        }

        $validated = $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'permission_ids' => ['nullable', 'array'],
            'permission_ids.*' => ['exists:abilities,id'],
        ]);

        $role = Bouncer::role()->findOrFail($validated['role_id']);
        Bouncer::scope()->to($role->scope);

        DB::beginTransaction();
        try {
            if (!empty($validated['permission_ids'])) {
                foreach ($validated['permission_ids'] as $permissionId) {
                    $permission = Bouncer::ability()->findOrFail($permissionId);
                    if ($permission->scope === $role->scope) {
                        Bouncer::disallow($role->name)->to($permission->name);
                        Log::info('PermissionAssignmentController::revoke - Revoked permission', [
                            'role_id' => $role->id,
                            'permission_id' => $permission->id,
                            'permission_name' => $permission->name
                        ]);
                    }
                }
                DB::commit();
                Log::info('PermissionAssignmentController::revoke - Transaction committed');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('PermissionAssignmentController::revoke - Transaction failed', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
            return Redirect::route('permission-assignments.assign', ['role_id' => $role->id])
                ->with('error', 'Failed to revoke permissions: ' . $e->getMessage());
        }

        return Redirect::route('permission-assignments.assign', ['role_id' => $role->id])
            ->with('status', 'permissions-revoked');
    }
}