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
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::route('permissions.index')->with('error', 'No authenticated user found.');
        }

        Bouncer::scope()->to($user->account_id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:abilities,name,NULL,id,scope,' . $user->account_id],
            'title' => ['required', 'string', 'max:255'],
        ]);

        Bouncer::ability()->create([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'scope' => $user->account_id,
        ]);

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