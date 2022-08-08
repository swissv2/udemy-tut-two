<x-admin-layout>


    <!-- Edit Role Section -->
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- begin form -->

                   <h1><strong>Edit a User</strong></h1>
                    <p>Edit a user here, and make it all soft and fluffy, yo.</p>
                    
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf   
                        @method('PUT')
                        <div>             
                            <label for="role" class="mt-5 block text-sm font-medium text-gray-700">Edit User:</label>
                            @error('name')
                                <span class="text-sm text-red-400">{{ $message }} </span>
                            @enderror
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $user->name }}"class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <!-- more user inputs -->
                            <div class="mt-1">
                                <input type="text" id="email" name="email" value="{{ $user->email }}"class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <!-- add all the spicey roles -->
                            <label for="roles_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"> <br />
                            Select role for user: <strong>{{ $user->name }}</strong> </label> 
                            <select 
                            name="role_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected($user->hasRole($role->name))>{{ $role->name }}</option>
                                @endforeach
                            </select>


                            <!-- end spicey roles -->
                        </div>

                        <div class="mt-2 flex justify-end">
                            <a href="{{ route('admin.users.index') }}" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</button></a>
                            <button type="submit" class="ml-2 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Update User</button>
                        </div>

                    </form>

                    <!-- end form -->
                </div>
            </div>
        </div>
    </div>

   



</x-admin-layout>