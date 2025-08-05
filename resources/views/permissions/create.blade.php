<!-- resources/views/permissions/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input id="title" name="title" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="role_ids" class="block text-sm font-medium text-gray-700">Assign to Roles (Optional)</label>
                            <select id="role_ids" name="role_ids[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                            </select>
                            @error('role_ids') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Permission</button>
                    </form>

                    <div class="mt-4">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>