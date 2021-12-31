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

                <h1 class="text-4xl font-black mb-4">Cart</h1>
                
                <div style="width:100%">
                    @if (($films) && (count($films) > 0))

                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="border-b-2">
                                    <th class="text-left">#</th>
                                    <th class="text-left">Film Name</th>
                                    <th class="text-left">Price</th>
                                    <th class="text-left">Edit</th>
                                    <th class="text-left">Delete</th>

                                </tr>
                            </thead>

                            <tbody>
                                    @foreach ($films as $index => $film)

                                        <tr style="border-bottom-width:1px;">
                                            <td class="text-left py-2" >{{$index+1}}</td>
                                            <td class="text-left" >{{$film->name}}</td>
                                            <td class="text-left"># {{$film->price}}</td>
                                            <td>
                                                <form method="POST" action="/remove-from-cart">
                                                    @csrf
                                                    <input type="hidden" name="film_id" value="{{$film->id}}"/>
                                                    <x-button type="submit" class="my-1.5 normal-case" style="background: #146AB5; font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                                                        {{ __('Edit') }}
                                                    </x-button><br>
                                                </form>  
                                            </td>
                                            <td>
                                                <form method="POST" action="/remove-from-cart">
                                                    @csrf
                                                    <input type="hidden" name="film_id" value="{{$film->id}}"/>
                                                    <x-button type="submit" class="my-1.5 normal-case" style="background: rgb(239 68 68); font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                                                        {{ __('Delete') }}
                                                    </x-button><br>
                                                </form>  
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>                        
                        </table>

                    @else
                        <h2 class="text-2xl font-black mb-4">No films have been added</h2>
                    @endif

                </div>
            </div>
            </div>
            </div>
    </div>
    
</x-app-layout>
