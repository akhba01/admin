<x-admin-layout>
    {{-- @dd($user->permissions) --}}
    {{-- @dd($user->roles) --}}
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-400 rounded-md  text-white">Role Index Page</a>
                </div>
                <!-- component -->
                <section class="container mx-auto p-6 font-mono bg-slate-300">
                    <div> User : {{ $user->name }}</div>
                    <div> Email : {{ $user->email }}</div>
                </section>
                <div class="container mx-auto p-6 font-mono bg-slate-300">
                    <h2 class="text-2xl font-semibold">Permissions</h2>
                    <div class="p-2 flex space-x-2 flex-col bg-slate-400">
                        {{-- @dd(count($user->permissions)) --}}
                        @if (count($user->permissions) > 0)
                            <p class="item-center ml-2">Delete permission</p>
                            <div class=" flex flex-row space-x-2">
                                @foreach ($user->permissions as $user_permission)
                                    <form method="POST"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-lg"
                                        action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}">
                                        @csrf @method("DELETE")
                                        <button type="submit">
                                            {{ $user_permission->name }}
                                        </button>
                                    </form>
                                @endforeach

                            </div>
                        @endif
                    </div>
                    <div class="max-w-xl mt-2">
                        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                {{-- make dropdown list --}}
                                <div class="w-full px-3">
                                    <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="permission">
                                        Permissions
                                    </label>
                                    <select
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="permission" name="permission">
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('name')
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
                <div class="container mx-auto p-6 font-mono bg-slate-800">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="p-2 flex space-x-2 flex-col">
                        {{-- @dd(empty($user->roles)) --}}
                        @if (count($user->roles) > 0)
                            <p class="item-center ml-2">Delete users</p>
                            <div class=" flex flex-row space-x-2">
                                @foreach ($user->roles as $user_role)
                                    <form method="POST"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-lg"
                                        action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">
                                            {{ $user_role->name }}
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="max-w-xl mt-2">
                        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                {{-- make dropdown list --}}
                                <div class="w-full px-3">
                                    <label class="block  tracking-wide text-gray-700 text-xs font-bold mb-2" for="role">
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
