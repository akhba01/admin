<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-400 rounded-md  text-white">Role Index Page</a>
                </div>
                <!-- component -->
                <section class="container mx-auto p-6 font-mono">
                    <form method="POST" action="{{ route('admin.permissions.store') }}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white  first-letter: focus:border-gray-500 @error('name') ring-red-900  @enderror "
                                    id="grid-first-name" type="text" placeholder="Name" name="name">
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
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-admin-layout>
