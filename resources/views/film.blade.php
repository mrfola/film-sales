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
                    <a href="{{ url()->previous() }}" class="text-sky-600 font-black">< Back</a>
                </div>
            </div>
        </div>
    </div>

  <div class="container max-w-7xl mx-auto">

       {{-- @foreach ($films as $film) --}}

            <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
            <div class="px-6 py-12 bg-white border-b border-gray-200">

                <div class="flex flex-row flex-nowrap gap-10 pt-6">
                    <div class="basis-2/4">
                        <a href="#" class="href">
                            <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
                        </a>
                    </div>
                    
                    <div class="basis-3/4">
                        <h2 class="font-black mt-2 text-5xl ">{{$film->name}}</h2>
                        <p class="text-sm my-2">{{$film->average_rating}} stars | {{$film->created_at->toDateString()}} | Action, Romance, Dancing </p>
                        <p class="pt-3">{{ $film->description }}</p>
                        <p class="my-3"><strong>Price:</strong> #{{$film->price}}</p>
                        
                        <?php
                        $product_in_cart = false;

                        if(session()->has('cart_items'))
                        {
                            $cart_items = session('cart_items');
                            if (in_array($film->id, $cart_items))
                            { 
                                $product_in_cart = true;
                            }

                        }
                        ?>

                    @if($product_in_cart == true)
                    <a href="{{url('/cart')}}">
                        <x-button  class="my-1.5 normal-case" style="font-size:0.9em; padding: 0.6em 1.5em;">{{ __('View Cart') }}</x-button><br>
                    </a>
                    @else 
                        <form method="POST" action="/add-to-cart">
                            @csrf
                            <input type="hidden" name="film_id" value="{{$film->id}}"/>
                            <x-button type="submit" class="my-1.5 normal-case" style="font-size:0.9em; padding: 0.6em 1.5em;">{{ __('Add To Cart') }}</x-button><br>
                        </form>
                    @endif                        
                    <x-button class="my-1.5 normal-case" style="font-size:0.9em; padding: 0.6em 1.5em;">{{ __('Play Trailer') }}</x-button><br>
                    </div>
                
                </div> 
            </div>
            </div>
            </div>

        {{-- @endforeach --}}
    
</x-app-layout>
