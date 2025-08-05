<!-- resources/views/permission-assignments/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Assignments') }}
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
                    <a href="{{ route('permission-assignments.assign') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Assign Permissions with Checkboxes</a>
                    <form method="POST" action="{{ route('permission-assignments.assign') }}" class="mb-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
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
                            <div>
                                <label for="permission_id" class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission_id" name="permission_ids[]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Select Permission</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->title }}</option>
                                    @endforeach
                                </select>
                                @error('permission_ids') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Assign Permission</button>
                    </form>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $abilities = Bouncer::ability()->whereIn('id', DB::table('permissions')
                                                ->where('entity_id', $role->id)
                                                ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                                                ->where('scope', $role->scope)
                                                ->pluck('ability_id'))->get();
                                        @endphp
                                        @foreach ($abilities as $ability)
                                            {{ $ability->title }}@if (!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @foreach ($abilities as $ability)
                                            <form action="{{ route('permission-assignments.revoke') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                <input type="hidden" name="permission_ids[]" value="{{ $ability->id }}">
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Revoke {{ $ability->title }} from {{ $role->title }}?')">Revoke {{ $ability->title }}</button>
                                            </form>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>