<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-400 rounded-md  text-white">Permission Index Page</a>
                </div>
                <!-- component -->
                <section class="container mx-auto p-6 font-mono">
                    <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                        @csrf
                        @method("PUT")
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white  first-letter: focus:border-gray-500 @error('name') ring-red-900 @enderror "
                                    id="grid-first-name" type="text" placeholder="Name" name="name" value="{{ $permission->name }}">
                                @error('name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="flex items-center justify-end">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
                <div class="container mx-auto p-6 font-mono bg-slate-800">
                    <h2 class="text-2xl font-semibold"> Roles</h2>
                    <div class="p-2 flex space-x-2 flex-col">
                        {{-- @dd($role->permission) --}}
                        @if ($permission->roles)
                            <p class="item-center ml-2">Delete Permissions</p>
                            <div class=" flex flex-row space-x-2">
                            @foreach ($permission->roles as $permission_role)
                                    <form method="POST" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-lg"
                                        action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}">
                                        @csrf @method("DELETE")
                                        <button type="submit">
                                            {{ $permission_role->name }}
                                        </button>
                                    </form>
                                 @endforeach
                             </div>
                        @endif
                    </div>
                    <div class="max-w-xl mt-2">
                        <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                {{-- make dropdown list --}}
                                <div class="w-full px-3">
                                    <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="role">
                                        Roles
                                    </label>
                                    <select
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="role" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('role')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror

                            <div class="sm:col-span-6 pt-5">
                                <div class="flex items-center justify-end">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit">
                                        Assign Role
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
