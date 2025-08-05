<?php
// app/Http/Controllers/RoleController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Bouncer::role()->paginate(15);
        return view('roles.index', compact('roles'));
    }

    public function create(): View
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::route('roles.index')->with('error', 'No authenticated user found.');
        }

        Bouncer::scope()->to($user->account_id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,NULL,id,scope,' . $user->account_id],
            'title' => ['required', 'string', 'max:255'],
        ]);

        Bouncer::role()->create([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'scope' => $user->account_id,
        ]);

        return Redirect::route('roles.index')->with('status', 'role-created');
    }

    public function edit($role): View
    {
        $role = Bouncer::role()->findOrFail($role);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $role)
    {
        $role = Bouncer::role()->findOrFail($role);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id . ',id,scope,' . $role->scope],
            'title' => ['required', 'string', 'max:255'],
        ]);

        $role->update($validated);

        return Redirect::route('roles.index')->with('status', 'role-updated');
    }

    public function destroy($role)
    {
        $role = Bouncer::role()->findOrFail($role);
        $role->delete();
        return Redirect::route('roles.index')->with('status', 'role-deleted');
    }
}