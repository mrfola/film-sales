<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FilmSales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-black">Available Movies</h1>
                </div>
            </div>
        </div>
    </div>

  <div class="container max-w-7xl mx-auto">
  <div class="grid grid-cols-4 gap-8 px-4 py-4">

        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="#" class="href">
                    <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
                </a>
                <h2 class="font-black mt-2 text-lg">Movie Title</h2>
                <p class="text-xs">4.5 stars | 16, Dec, 2021 </p>
                <p class="py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna aliqua.</p>
                    <div class="flex flex-row flex-nowrap py-3">
                        <x-button class="mr-3" style="font-size:10px; padding:7px 12px;">{{ __('View Details') }}</x-button>
                        <x-button class="mr-3" style="font-size:10px; padding:7px 12px;">{{ __('Add To Cart') }}</x-button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a href="#" class="href">
                <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
            </a>
        </div>

        <div class="mt-8">
            <a href="#" class="href">
                <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
            </a>
        </div>

        <div class="mt-8">
            <a href="#" class="href">
                <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
            </a>
        </div>
    </div>
  </div>
    
    
</x-app-layout>
