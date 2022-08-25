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

                    <!-- begin editing campaign here -->

                    <div class="py-1">
                            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-1 bg-white">
                                        <!-- begin form -->                   

                                        <h1><strong>Create New Post</strong></h1>
                                        <p>Create a new post and make it fire, yo</p>

                                        <form method="POST" action="{{ route('posts.store') }}">
                                            @csrf
                                            <div>
                                                <label for="post_title" class="mt-5 block text-sm font-medium text-gray-700">New Post Title:</label>
                                                @error('title')
                                                    <span class="text-sm text-red-400">{{ $message }} </span>
                                                @enderror
                                                <div class="mt-1">
                                                    <input type="text" id="title" name="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                <label for="body" class="block text-sm font-medium text-gray-700">Content:</label>
                                                <div class="mt-1">
                                                    <textarea rows="4" name="body" id="editor" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                                    <script>
                                                        ClassicEditor
                                                            .create( document.querySelector( '#editor' ) )
                                                            .catch( error => {
                                                                console.error( error );
                                                            } );
                                                    </script>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 flex justify-end">
                                                <a href="{{ route('posts.index') }}" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</button></a>
                                                <button type="submit" class="ml-2 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Create New Post</button>
                                            </div>

                                        </form>

                                        <!-- end form -->
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