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

            <div class="" style="min-height:80vh;"">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
            <div class="px-6 py-12 bg-white border-b border-gray-200">

                <div class="flex flex-row flex-nowrap gap-10 pt-6">
                    <div class="basis-2/4">
                        <a href="#" class="href">
                            <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
                        </a>
                    </div>
                    
                    <div class="basis-3/4">
                         <!-- message -->
                        <p class="text-center">{{session()->get('message')}}</p>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="/admin/films/{{$film->id}}">
                            @method('PATCH')
                            @csrf
                            <div class="pt-4">
                                <x-label for="name" :value="__('Film Name')" />
                                <x-input id="name" type="text" placeholder="Film Name" class="block mt-1 w-full" type="text" name="name" value="{{$film['name']}}" autofocus />
                            </div>

                            <div class="pt-4">
                                <x-label for="genre" :value="__('Film Genre')" />
                                <select id="genre" name="genre" type="text"  value="{{$film['name']}}"  autofocus
                                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                >
                                    <?php 
                                        $genres = new App\Models\Genre();
                                        $genres = $genres->get();

                                        foreach ($genres as $genre)
                                        {
                                            echo "<option value='$genre->id'> $genre->name </option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="pt-4">
                                <x-label for="price" :value="__('Film Price')" />
                                <x-input id="price" type="text" placeholder="Film Price" class="block mt-1 w-full" name="price" value="{{$film['price']}}" autofocus />
                            </div>

                            <div class="pt-4">
                                <x-label for="description" :value="__('Film Description')" />
                                <textarea id="description" placeholder="Film Descrtiption" name="description" autofocus 
                                class="w-full rounded-md block mt-1 w-full shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                {{$film['description']}}
                                </textarea>
                            </div>

                            <x-button class="my-1.5 normal-case" style="background: #146AB5; font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                                {{ __('Update') }}
                            </x-button>
                        </form>

                        <form method="POST" action="/admin/films/{{$film->id}}" class="float:right;">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="film_id" value="{{$film->id}}"/>
                            <x-button type="submit" class="my-1.5 normal-case" style="background: rgb(239 68 68); font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                                {{ __('Delete') }}
                            </x-button><br>
                        </form>  
                        </td>
                    </div>
                
                </div> 
            </div>
            </div>
            </div>
    
</x-app-layout>
