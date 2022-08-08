<x-admin-layout>


    <!-- Edit Role Section -->
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

    <!-- permissions section -->

    <div class="py-1">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- begin form -->

                   <h1><strong>Role Permissions for: ({{ $role->name }})</strong></h1>

                   <!-- insert info -->
                    @foreach ($role->permissions as $rp)
                        <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ $rp->name }}</span>
                    @endforeach
                    

                   <!-- end insert info --><br />
                    
                   <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                        @csrf   
                        <label for="permissions_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Select permission(s) for role: <strong>{{ $role->name }}</strong> </label> 
                        <select 
                        name="permissions[]"
                        multiple id="permissions_multiple" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->name))>{{ $permission->name }}</option>
                            @endforeach
                        </select>

                        <!-- buttons -->
                        <div class="mt-2 flex justify-end">
                            <a href="{{ route('admin.roles.index') }}" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">&laquo; Back</button></a>
                            <button type="submit" class="ml-2 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Assign Permission(s)</button>
                        </div>

                    <!-- end form -->
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-admin-layout>