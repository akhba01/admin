<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.permissions.create') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-400 rounded-md  text-white">Create</a>
                </div>
                <!-- component -->
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3">Permissions</th>
                                        <th class="px-4 py-3 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="px-4 py-3">{{ $permission->name }}</td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2 mr-2">
                                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-lg" >Edit</a>
                                                        <form method="POST"
                                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-lg"
                                                            action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                            onsubmit="return confirm('Are you sure ?')">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-admin-layout>
