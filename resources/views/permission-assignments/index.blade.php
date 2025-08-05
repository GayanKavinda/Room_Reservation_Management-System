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
                    @if (session('error'))
                        <div class="mb-4 font-medium text-sm text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif
                    <a href="{{ route('permission-assignments.assign') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Assign Permissions with Checkboxes</a>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            \Silber\Bouncer\BouncerFacade::scope()->to($role->scope);
                                            $abilities = \Silber\Bouncer\BouncerFacade::ability()->whereIn('id', \Illuminate\Support\Facades\DB::table('permissions')
                                                ->where('entity_id', $role->id)
                                                ->where('entity_type', \Silber\Bouncer\Database\Role::class)
                                                ->where('scope', $role->scope)
                                                ->pluck('ability_id'))->get();
                                            \Illuminate\Support\Facades\Log::info('PermissionAssignmentsBlade - Permissions for role', [
                                                'role_id' => $role->id,
                                                'role_name' => $role->name,
                                                'scope' => $role->scope,
                                                'permissions' => $abilities->pluck('name')->toArray()
                                            ]);
                                        @endphp
                                        @foreach ($abilities as $ability)
                                            {{ $ability->title }}@if (!$loop->last), @endif
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