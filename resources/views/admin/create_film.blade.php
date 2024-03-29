<x-admin.app-layout>

    <x-admin.top-bar/>
    <x-admin.sidebar/>

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

                            <h1 class="text-4xl font-black mb-4">Add New Film</h1>

                            <!-- Form to add film -->
                            @include('admin.create_film_form')
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
