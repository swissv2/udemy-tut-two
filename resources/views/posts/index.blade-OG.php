<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

<!-- begin post data here -->

<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">

    
      <h1 class="text-xl font-semibold text-gray-900">Posts</h1>
      <p class="mt-2 text-sm text-gray-700">A list of posts and such in your database, and such.</p>
    </div>
    <!-- allow posting -->
        @can('create', App\Models\Post::class)
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('posts.create') }}"><button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New Post</button></a>
            </div>   
        @endcan 
    <!-- end allow posting -->
  </div>


   <!-- add a notification message -->              

   @if (Session::has('message'))
                <div id="alert-1" class="flex p-4 mb-0 mt-2 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                    {{ Session::get('message') }} 
                </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                </div>                
               @endif
      <!-- end notification message -->
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">

              <?php 
                //firstItem() represents 1st item in the data sequence for the page
                $count = $posts->firstItem();
              ?>
              @foreach ($posts as $post)      
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo $count; ?></td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post -> title }}</a></td>            
                <td class="flex whitespace-nowrap py-4 text-sm text-right font-medium " >
                    @can('update', $post)
                      [<a href="{{ route('posts.edit', $post->id ) }}" class="text-indigo-600 hover:underline text-right"> Edit </a>] &nbsp;
                    @endcan

                    @can('delete', $post)
                      <form method="POST"
                            action="{{ route('posts.destroy', $post->id) }}"
                            onsubmit="return confirm('Deleting post. Are you sure?');">
                        @csrf
                        @method('DELETE')
                        [<button type="submit" class="text-red-400 hover:underline text-right"> Delete </button>]
                      </form>
                    @endcan
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
          <!-- pagination  -->
          <div class="mt-2">
          {{ $posts->onEachSide(1)->links() }}
          </div>
          <!-- /pagination -->

         
      </div>
    </div>
  </div>
</div>

<!-- end post data -->

</div>
            </div>
        </div>
    </div>

</x-app-layout>