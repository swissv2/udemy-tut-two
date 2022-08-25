<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <!-- empty spacer -->
                        </div>
                        <!-- allow qualified posting -->
                        @can('update', $post)  
                          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <a href="{{ route('posts.edit', $post->id ) }}">
                              <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Edit this post</button>
                            </a>
                          </div>
                        @endcan
                        <!-- /end qualified posting -->
                    </div>


                    <!-- begin showing a single post here -->
                    
                    <div class="py-1">
                            <div class="max-w-full mx-auto sm:px-6 lg:px-8  mb-2">
                                (&laquo; <a href="/posts" class="text-indigo-600 hover:underline text-right">back to posts</a>)
                                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-4 mt-4">
                                    <div class="p-1 bg-white">
                                        <!-- begin  single post -->                   
                                        <div class="mt-2 mb-2">
                                            <h1 style="font-size:21px"><strong>{{ $post->title }}</strong></h1>
                                            <p class="mt-4">{!! $post->body !!}</p>
                                        </div>
                                        

                                        <!-- end single post -->
                                    </div>
                                   
                                </div>                                
                            </div>
                        </div>
                    <!-- end editing campaign -->

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>