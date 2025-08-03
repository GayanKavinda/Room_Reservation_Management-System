<!-- resources/views/errors/403.blade.php -->
<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold text-gray-800">403</h1>
        <p class="text-xl text-gray-600 mb-4">Unauthorized Action</p>
        <p class="text-gray-500">You do not have permission to access this page.</p>
        <a href="{{ route('dashboard') }}" class="mt-4 text-blue-600 hover:underline">Return to Dashboard</a>
    </div>
</x-guest-layout>