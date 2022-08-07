<x-admin-layout>


<div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- begin form -->

                   <h1><strong>Edit a Role</strong></h1>
                    <p>Edit a role here, and make it all steamy and frothy, yo.</p>
                    
                    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                        @csrf   
                        @method('PUT')
                        <div>             
                            <label for="permission" class="mt-5 block text-sm font-medium text-gray-700">Edit Role:</label>
                            @error('name')
                                <span class="text-sm text-red-400">{{ $message }} </span>
                            @enderror
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $role->name }}"class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="mt-2 flex justify-end">
                            <a href="{{ route('admin.roles.index') }}" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</button></a>
                            <button type="submit" class="ml-2 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Update Role</button>
                        </div>

                    </form>

                    <!-- end form -->
                </div>
            </div>
        </div>
    </div>



</x-admin-layout>