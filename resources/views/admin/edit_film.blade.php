<x-admin.app-layout>

    <x-admin.top-bar/>

    <div class="container max-w-7xl mx-auto">
        <div class="" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="px-6 py-12 bg-white border-b border-gray-200">

                    <div class="flex flex-row flex-nowrap gap-10 pt-6">
                        <div class="basis-2/5">
                            <a href="#" class="href">
                                <img src="https://theweebshop.com/wp-content/uploads/2021/08/product5-300x300.jpeg" alt="image" class />
                            </a>
                        </div>
                        
                        <div class="basis-3/5">
                                <!-- message -->
                            <p class="text-center">{{session()->get('message')}}</p>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <!-- Update Film Form -->
                            @include('admin.film_update_form');

                            <!-- Delete Film -->
                            <form method="POST" action="/admin/films/{{$film->id}}" class="float:right;">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="film_id" value="{{$film->id}}"/>
                                <x-button type="submit" class="my-1.5 normal-case" style="background: rgb(239 68 68); font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                                    {{ __('Delete') }}
                                </x-button><br>
                            </form>  

                        </div>
                    
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
