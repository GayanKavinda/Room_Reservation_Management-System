<?php
// app/Http/Controllers/RoleAssignmentController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleAssignmentController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles')->paginate(15); // Paginate users
        $roles = Bouncer::role()->paginate(15); // Paginate roles
        // $users = User::with('roles')->get();
        // $roles = Bouncer::role()->all();
        return view('role-assignments.index', compact('users', 'roles'));
    }

    public function assign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user = User::findOrFail($validated['user_id']);
        $role = Bouncer::role()->findOrFail($validated['role_id']);
        Bouncer::scope()->to($user->account_id);
        Bouncer::assign($role->name)->to($user);

        return Redirect::route('role-assignments.index')->with('status', 'role-assigned');
    }

    public function revoke(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user = User::findOrFail($validated['user_id']);
        $role = Bouncer::role()->findOrFail($validated['role_id']);
        Bouncer::scope()->to($user->account_id);
        Bouncer::retract($role->name)->from($user);

        return Redirect::route('role-assignments.index')->with('status', 'role-revoked');
    }
}