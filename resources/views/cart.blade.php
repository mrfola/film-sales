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

            <div class="" style="height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
            <div class="px-6 py-12 bg-white border-b border-gray-200">

                <h1 class="text-4xl font-black mb-4">Cart</h1>
                
                <div style="width:100%">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="border-b-2">
                                <th class="text-left">#</th>
                                <th class="text-left">Film Name</th>
                                <th class="text-left">Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $total_price = 0; ?>
                            @foreach ($cart_items as $index => $cart_item)
                            <?php $total_price = $total_price + $cart_item->price; ?>

                                <tr style="border-bottom-width:1px;">
                                    <td class="text-left py-2" >{{$index}}</td>
                                    <td class="text-left" >{{$cart_item->name}}</td>
                                    <td class="text-left"># {{$cart_item->price}}</td>
                                </tr>
                            @endforeach
                            <tr style="border-bottom-width:1px;">
                                <td class="text-left py-2" ></td>
                                <td class="text-left" ></td>
                                <td class="text-right py-3 text-lg font-black">Total: #{{$total_price}}</td>
                            </tr>
                        </tbody>                        
                    </table>
                </div>
            </div>
            </div>
            </div>
    </div>
    
</x-app-layout>
