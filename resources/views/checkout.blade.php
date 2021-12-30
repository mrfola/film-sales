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
    <div class="" style="min-height:80vh;">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
    <div class="px-6 py-12 bg-white border-b border-gray-200">
            <h3 class="text-center text-4xl ">Buy Films (N{{$total_price}})</h3>
            <form class="mx-auto" style="width:60%; margin-top:2em;" method="POST" action="{{ route('pay') }}" id="paymentForm">
                {{ csrf_field() }}

                <div class="pt-4">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" type="text" placeholder="Your Name" class="block mt-1 w-full" type="text" name="name" value="{{$user['name']}}" required autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="email" :value="__('Email')" />
    
                    <x-input id="email" placeholder="Your Email"  class="block mt-1 w-full" type="email" name="email" value="{{$user['email']}}" required autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="phone" :value="__('Phone')" />
    
                    <x-input id="phone" type="tel" placeholder="Your Number"  class="block mt-1 w-full" name="phone" :value="old('phone')" required autofocus />
                </div>
                <input type="hidden" name="products_array" value="{{$products_array}}"/>
                <input type="hidden" name="total_price" value="{{$total_price}}"/>
            
                <x-button class="ml-3 mt-3" style="font-size:1.2em; padding:0.6em 3.5em;">
                    {{ __('Pay') }}
                </x-button>  

            </form>
        </div>
    </div>
</div>
    </div>
    
</x-app-layout>
