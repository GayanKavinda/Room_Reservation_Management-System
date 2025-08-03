<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class PermissionAssignmentController extends Controller
{
    public function index(): View
    {
        $roles = Bouncer::role()->paginate(15); // Paginate roles
        $permissions = Bouncer::ability()->paginate(15); // Paginate permissions
        return view('permission-assignments.index', compact('roles', 'permissions'));
    }

    public function assign(Request $request)
    {
        $validated = $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'permission_id' => ['required', 'exists:abilities,id'],
        ]);

        $role = Bouncer::role()->findOrFail($validated['role_id']);
        $permission = Bouncer::ability()->findOrFail($validated['permission_id']);

        // Ensure the scope matches
        Bouncer::scope()->to($role->scope);
        Bouncer::allow($role->name)->to($permission->name);

        return Redirect::route('permission-assignments.index')->with('status', 'permission-assigned');
    }

    public function revoke(Request $request)
    {
        $validated = $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'permission_id' => ['required', 'exists:abilities,id'],
        ]);

        $role = Bouncer::role()->findOrFail($validated['role_id']);
        $permission = Bouncer::ability()->findOrFail($validated['permission_id']);

        // Ensure the scope matches
        Bouncer::scope()->to($role->scope);
        Bouncer::disallow($role->name)->to($permission->name);

        return Redirect::route('permission-assignments.index')->with('status', 'permission-revoked');
    }
}