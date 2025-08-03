<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    // Using Laravel's native "can" middleware
    // public function __construct()
    // {
    //     $this->middleware('can:manage-users');
    // }

    public function index(): View
    {
        $users = User::with('roles')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'account_id' => ['required', 'integer'], // Make account_id required
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'account_id' => $validated['account_id'],
        ]);

        return Redirect::route('users.index')->with('status', 'user-created');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'account_id' => ['required', 'integer'], // Make account_id required
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            'account_id' => $validated['account_id'],
        ]);

        return Redirect::route('users.index')->with('status', 'user-updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index')->with('status', 'user-deleted');
    }
}