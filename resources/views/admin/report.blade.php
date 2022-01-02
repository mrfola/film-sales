<x-admin.app-layout>

    <x-admin.top-bar/>


  <div class="container max-w-7xl mx-auto">

    <div class="" style="min-height:80vh;">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
    <div class="px-6 py-12 bg-white border-b border-gray-200">

        
        <h1 class="text-4xl font-black mb-4">Cart</h1>
                
        <div style="width:100%">

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="border-b-2">
                            <th scope="col" class="text-left">The total number of monthly sales</th>
                            <th scope="col" class="text-left">The total number of films purchased by the customers</th>
                            <th scope="col" class="text-left">The products that end with the character ‘s’</th>
                            <th scope="col" class="text-left">Films that have Genre – ‘Action’</th>
                            <th scope="col" class="text-left">Customers whose age is above 50’</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr style="border-bottom-width:1px;">
                            <td class="text-left py-2" >{{$index+1}}</td>
                            <td class="text-left" >{{$cart_item->name}}</td>
                            <td class="text-left"># {{$cart_item->price}}</td>
                            <td>
                                <form method="POST" action="/remove-from-cart">
                                    @csrf
                                    <input type="hidden" name="film_id" value="{{$cart_item->id}}"/>
                                    <x-button type="submit" class="my-1.5 normal-case" style="background: rgb(239 68 68); font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">{{ __('Remove') }}</x-button><br>
                                </form>  
                            </td>
                        </tr>
                    </tbody>             
                </table>

        </div>
        
    </div> 
    </div>
    </div>
</div>
    
</x-admin.app-layout>
