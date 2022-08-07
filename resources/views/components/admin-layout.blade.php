<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Udemy - Tut2 - Admin</title>
        
       <!-- Scripts -->
       @vite(['resources/css/app.css', 'resources/js/app.js'])

       <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('layouts.sidebar')
            
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('layouts.header')

                <!-- add a notification message -->
                @if (Session::has('message'))
                <div class="bg-indigo-600" x-data="{ bannerOpen: true }" x-show="bannerOpen">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-indigo-800">
                        <!-- Heroicon name: outline/speakerphone -->
                        <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="white" ><title/><path d="M64,128a10.18,10.18,0,0,1-7.22-3h0L3,71.22A10.21,10.21,0,0,1,3,56.78L56.78,3A10.22,10.22,0,0,1,71.22,3L125,56.78a10.21,10.21,0,0,1,0,14.44L71.22,125A10.18,10.18,0,0,1,64,128Zm-4.39-5.82a6.2,6.2,0,0,0,8.78,0l53.79-53.79a6.2,6.2,0,0,0,0-8.78L68.39,5.82a6.2,6.2,0,0,0-8.78,0L5.82,59.61a6.2,6.2,0,0,0,0,8.78l53.79,53.79Z"/><path d="M64,82a8.24,8.24,0,0,1-8.25-7.91L54.27,38.6A8.25,8.25,0,0,1,62.52,30h3a8.25,8.25,0,0,1,8.25,8.6L72.25,74.09A8.24,8.24,0,0,1,64,82ZM62.52,34a4.25,4.25,0,0,0-4.25,4.43l1.48,35.49a4.25,4.25,0,0,0,8.5,0l1.48-35.49A4.25,4.25,0,0,0,65.48,34Z"/><path d="M64,102a8,8,0,1,1,8-8A8,8,0,0,1,64,102Zm0-12a4,4,0,1,0,4,4A4,4,0,0,0,64,90Z"/></svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                        <span class="md:hidden"> {{ Session::get('message') }} </span>
                        <span class="hidden md:inline"> {{ Session::get('message') }}  </span>
                        </p>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button type="button" @click="bannerOpen = false" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        </button>
                    </div>
                    </div>
                </div>
                </div>
               @endif
                <!-- end notification message -->

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                       {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        @tailwind components;
    </body>
</html>