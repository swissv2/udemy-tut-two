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

                    <div class="flex-parent-element">
                        <div class="flex-child-element magenta"> <x-embed url="https://www.youtube.com/watch?v=nAzy7wWSTfE"  /> Iga Swiatek US Open Run 2022</div>
                        <div class="flex-child-element green"> <x-embed url="https://www.youtube.com/watch?v=SEFnfcfvLkw"  /> Carlos Alcaraz Us Open Run 2022</div>
                      </div>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
