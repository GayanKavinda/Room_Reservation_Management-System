<?php
// app/Http/Controllers/PermissionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Explicitly import Auth
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class PermissionController extends Controller
{
    public function index(): View
    {
        $permissions = Bouncer::ability()->paginate(15);
        return view('permissions.index', compact('permissions'));
    }

    public function create(): View
    {
        $roles = Bouncer::role()->paginate(15); // Fetch roles for the create form
        return view('permissions.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::route('permissions.index')->with('error', 'No authenticated user found.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:abilities,name,NULL,id,scope,' . $user->account_id],
            'title' => ['required', 'string', 'max:255'],
            'role_ids' => ['nullable', 'array'], // Allow multiple roles
            'role_ids.*' => ['exists:roles,id'], // Validate each role ID
        ]);

        Bouncer::scope()->to($user->account_id);
        $permission = Bouncer::ability()->create([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'scope' => $user->account_id,
        ]);

        // Assign the permission to selected roles
        if (!empty($validated['role_ids'])) {
            foreach ($validated['role_ids'] as $roleId) {
                $role = Bouncer::role()->findOrFail($roleId);
                if ($role->scope === $user->account_id) { // Ensure scope matches
                    Bouncer::allow($role->name)->to($permission->name);
                }
            }
        }

        return Redirect::route('permissions.index')->with('status', 'permission-created');
    }

    public function edit($permission): View
    {
        $permission = Bouncer::ability()->findOrFail($permission);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $permission)
    {
        $permission = Bouncer::ability()->findOrFail($permission);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:abilities,name,' . $permission->id . ',id,scope,' . $permission->scope],
            'title' => ['required', 'string', 'max:255'],
        ]);

        $permission->update($validated);

        return Redirect::route('permissions.index')->with('status', 'permission-updated');
    }

    public function destroy($permission)
    {
        $permission = Bouncer::ability()->findOrFail($permission);
        $permission->delete();
        return Redirect::route('permissions.index')->with('status', 'permission-deleted');
    }
}