<!-- resources/views/permission-assignments/assign.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Permissions to Role') }}
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

                    <!-- Role Selection Form -->
                    <form method="GET" action="{{ route('permission-assignments.assign') }}" class="mb-6">
                        <div class="mb-4">
                            <label for="role_id" class="block text-sm font-medium text-gray-700">Select Role</label>
                            <select id="role_id" name="role_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" onchange="this.form.submit()" required>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $selectedRole && $selectedRole->id === $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
                                @endforeach
                            </select>
                            @error('role_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </form>

                    <!-- Permissions Assignment Form -->
                    @if ($selectedRole)
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-800 mb-4">Permissions for {{ $selectedRole->title }}</h3>
                            <form method="POST" action="{{ route('permission-assignments.assign') }}" class="mb-4">
                                @csrf
                                <input type="hidden" name="role_id" value="{{ $selectedRole->id }}">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Available Permissions</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach ($permissions as $permission)
                                            <div class="flex items-center">
                                                <input type="checkbox" name="permission_ids[]" value="{{ $permission->id }}"
                                                       id="permission_{{ $permission->id }}"
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                       {{ $assignedPermissions->pluck('id')->contains($permission->id) ? 'checked' : '' }}>
                                                <label for="permission_{{ $permission->id }}" class="ml-2 text-sm text-gray-700">{{ $permission->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permission_ids') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes Permissions</button>
                            </form>
                        </div>

                        <!-- Pagination for Permissions -->
                        <div class="mt-4">
                            {{ $permissions->links() }}
                        </div>
                    @endif

                    <!-- Pagination for Roles -->
                    <div class="mt-4">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>