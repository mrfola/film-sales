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

       @foreach ($films as $film)

            <div class="">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <a href="#" class="href">
                        <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
                    </a>
                    <h2 class="font-black mt-2 text-lg">{{$film->name}}</h2>
                    <p class="text-xs">{{$film->average_rating}} stars | {{$film->created_at->toDateString()}} </p>
                    <p class="mt-3"><strong>Price:</strong> #{{$film->price}}</p>
                    <p class="py-3">{{ \Illuminate\Support\Str::limit($film->description, 100, $end='...') }}</p>
                        <div class="flex flex-row flex-nowrap py-3">
                            <a href="{{ url('/films',$film->id)}}"><x-button class="mr-3"  style="font-size:0.65em; font-weight:normal; padding: 0.6em 1.5em;">{{ __('View Details') }}</x-button></a>
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
                            <x-button  style="font-size:0.6em; font-weight:normal; padding: 0.65em 1.5em;">{{ __('View Cart') }}</x-button><br>
                        </a>
                        @else 
                            <form method="POST" action="/add-to-cart">
                                @csrf
                                <input type="hidden" name="film_id" value="{{$film->id}}"/>
                                <x-button type="submit" class="" style="font-size:0.6em; font-weight:normal; padding: 0.6em 1.5em;" >{{ __('Add To Cart') }}</x-button><br>
                            </form>
                        @endif
                        </div>
                        
                    </div>
                </div>
            </div>

        @endforeach

    </div>
  </div>
    
    
</x-app-layout>
