<!-- resources/views/role-assignments/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 font-medium text-sm text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('role-assignments.assign') }}" class="mb-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                                <select id="user_id" name="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                    @endforeach
                                </select>
                                @error('user_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                                <select id="role_id" name="role_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                                    @endforeach
                                </select>
                                @error('role_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Assign Role</button>
                    </form>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }} ({{ $user->email }})</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $user->roles->first() ? $user->roles->first()->title : 'None' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $role = $user->roles->first();
                                            \Silber\Bouncer\BouncerFacade::scope()->to($user->account_id ?? 1);
                                            $abilities = $role ? \Silber\Bouncer\BouncerFacade::ability()->whereIn('id', \Illuminate\Support\Facades\DB::table('permissions')
                                                ->where('entity_id', $role->id)
                                                ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                                                ->where('scope', $role->scope)
                                                ->pluck('ability_id'))->get() : collect([]);
                                            \Illuminate\Support\Facades\Log::info('RoleAssignmentsBlade - Permissions for user', [
                                                'user_id' => $user->id,
                                                'user_email' => $user->email,
                                                'role' => $role ? $role->name : 'none',
                                                'role_id' => $role ? $role->id : null,
                                                'scope' => $role ? $role->scope : null,
                                                'permissions' => $abilities->pluck('name')->toArray()
                                            ]);
                                        @endphp
                                        @foreach ($abilities as $ability)
                                            {{ $ability->title }}@if (!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($user->roles->first())
                                            <form action="{{ route('role-assignments.revoke') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="hidden" name="role_id" value="{{ $user->roles->first()->id }}">
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Revoke {{ $user->roles->first()->title }} from {{ $user->name }}?')">Revoke {{ $user->roles->first()->title }}</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>