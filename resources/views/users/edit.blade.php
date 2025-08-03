<!-- resources/views/users/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password (Leave blank to keep unchanged)</label>
                            <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="account_id" class="block text-sm font-medium text-gray-700">Account ID (Optional)</label>
                            <input id="account_id" name="account_id" type="number" value="{{ old('account_id', $user->account_id) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('account_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>