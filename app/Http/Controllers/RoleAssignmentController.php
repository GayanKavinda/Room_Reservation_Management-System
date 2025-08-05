<?php
// app/Http/Controllers/RoleAssignmentController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleAssignmentController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        if (!$user) {
            Log::error('RoleAssignmentController::index - No authenticated user found');
            return view('role-assignments.index', ['users' => collect([]), 'roles' => collect([])])
                ->with('error', 'You must be logged in to view role assignments.');
        }

        $accountId = $user->account_id ?? 1;
        Bouncer::scope()->to($accountId);
        // Include users with matching account_id or NULL account_id
        $users = User::with('roles')
    ->where(function ($query) use ($accountId) {
        $query->where('account_id', $accountId)
              ->orWhereNull('account_id');
    })
    ->paginate(15);
$roles = Bouncer::role()->where('scope', $accountId)->paginate(15);

        // Log role assignments and permissions for debugging
        foreach ($users as $user) {
            $role = $user->roles->first();
            $permissions = $role ? Bouncer::ability()->whereIn('id', DB::table('permissions')
                ->where('entity_id', $role->id)
                ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                ->where('scope', $role->scope)
                ->pluck('ability_id'))->get() : collect([]);
            Log::info('RoleAssignmentController::index - User role and permissions', [
                'user_id' => $user->id,
                'user_email' => $user->email,
                'account_id' => $user->account_id,
                'role' => $role ? $role->name : 'none',
                'role_id' => $role ? $role->id : null,
                'scope' => $role ? $role->scope : null,
                'permissions' => $permissions->pluck('name')->toArray()
            ]);
        }

        return view('role-assignments.index', compact('users', 'roles'));
    }

    public function assign(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            Log::error('RoleAssignmentController::assign - No authenticated user found');
            return Redirect::route('role-assignments.index')->with('error', 'You must be logged in to assign roles.');
        }

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $targetUser = User::findOrFail($validated['user_id']);
        $role = Bouncer::role()->findOrFail($validated['role_id']);
        Bouncer::scope()->to($user->account_id ?? 1);

        // Set account_id for the user if it's NULL
        if (!$targetUser->account_id) {
            $targetUser->account_id = $user->account_id ?? 1;
            $targetUser->save();
            Log::info('RoleAssignmentController::assign - Set account_id for user', [
                'user_id' => $targetUser->id,
                'user_email' => $targetUser->email,
                'account_id' => $targetUser->account_id
            ]);
        }

        Log::info('RoleAssignmentController::assign - Attempting to assign role', [
            'user_id' => $targetUser->id,
            'user_email' => $targetUser->email,
            'role_id' => $role->id,
            'role_name' => $role->name,
            'scope' => $user->account_id
        ]);

        // Revoke all existing roles
        foreach ($targetUser->roles as $existingRole) {
            Bouncer::retract($existingRole->name)->from($targetUser);
            Log::info('RoleAssignmentController::assign - Revoked existing role', [
                'user_id' => $targetUser->id,
                'revoked_role' => $existingRole->name
            ]);
        }

        // Assign the new role
        Bouncer::assign($role->name)->to($targetUser);
        Log::info('RoleAssignmentController::assign - Assigned new role', [
            'user_id' => $targetUser->id,
            'role_name' => $role->name
        ]);

        return Redirect::route('role-assignments.index')->with('status', 'role-assigned');
    }

    public function revoke(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            Log::error('RoleAssignmentController::revoke - No authenticated user found');
            return Redirect::route('role-assignments.index')->with('error', 'You must be logged in to revoke roles.');
        }

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $targetUser = User::findOrFail($validated['user_id']);
        $role = Bouncer::role()->findOrFail($validated['role_id']);
        Bouncer::scope()->to($user->account_id ?? 1);

        Log::info('RoleAssignmentController::revoke - Revoking role', [
            'user_id' => $targetUser->id,
            'user_email' => $targetUser->email,
            'role_id' => $role->id,
            'role_name' => $role->name,
            'scope' => $user->account_id
        ]);

        Bouncer::retract($role->name)->from($targetUser);

        return Redirect::route('role-assignments.index')->with('status', 'role-revoked');
    }
}