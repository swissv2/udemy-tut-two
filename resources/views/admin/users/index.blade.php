<x-admin-layout>

<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Users</h1>
      <p class="mt-2 text-sm text-gray-700">A list of users and such in your database, and such.</p>
    </div>
    <!--
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <a href="{{ route('admin.users.create') }}"><button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add user</button></a>
    </div>
    -->
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Username</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                <th scope="col" class="relative py-5 pl-3 pr-4 sm:pr-6" style="width:40px">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">

              <?php 
                //start a counter so the ID count is even.
                $count = 1;
              ?>

              @foreach ($users as $user)              
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo $count; ?></td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user -> name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->role->name }}</td>                
                <td class="whitespace-nowrap px-12 py-4 text-sm text-right font-medium " style="width:40px">
                    [<a href="{{ route('admin.users.edit', $user->id ) }}" class="text-indigo-600 hover:underline text-right"> Edit </a>] &nbsp;
                    <form method="POST"
                          action="{{ route('admin.users.destroy', $user->id) }}"
                          onsubmit="return confirm('Deleting user. Are you sure?');">
                      @csrf
                      @method('DELETE')
                      [<button type="submit" class="text-red-400 hover:underline text-right"> Delete </button>]
                    </form>
                </td>
              </tr>

              <?php 
                //increment counter by 1
                $count++;
              ?>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

</x-admin-layout>