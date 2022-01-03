<x-admin.app-layout>

    <x-admin.top-bar/>
    <x-admin.sidebar/>


    @include('admin.dashboard_statistics')

  <div class="container max-w-7xl mx-auto">

            <div class="card-content" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
            <div class="px-6 py-12 bg-white border-b border-gray-200">
                <!-- message -->
                <p class="text-center">{{session()->get('message')}}</p>

                <div class="flex flex-row flex-nowrap gap-10 pt-6">
                    <div class="basis-1/5">
                        <h1 class="text-4xl font-black mb-4">Film List</h1>
                    </div>

                    <div class="basis-4/5">
                        <form method="POST" action="{{route('filter_admin_home')}}" class="float:right;">
                            @csrf

                            <div class="flex flex-row flex-nowrap">    
                                <x-select id="filter_type" name="filter_type" type="text" autofocus>
                                    <option value="STARTS_WITH">Films that start with</option>
                                    <option value="ENDS_WITH">Films that end with</option>
                                </x-select>

                                <x-input class="block mt-1 w-full ml-4" id="filter_text" type="text" min="1" max="1" placeholder="E.g Ultron"  name="filter_text" autofocus />
                                
                                <x-button type="submit" class="ml-4 my-1.5 normal-case" style="background: #0284C7; font-size:0.9em; font-weight:normal; padding: 0.6em 1.5em;">
                                    {{ __('Search') }}
                                </x-button><br>
                            </div>                           
                        </form>  
                    </div>
                </div>
                
                <div style="width:100%">
                    @if (($films) && (count($films) > 0))

                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="border-b-2">
                                    <th class="text-left">#</th>
                                    <th class="text-left">Film Name</th>
                                    <th class="text-left">Price</th>
                                    <th class="text-left">Genre</th>
                                    <th class="text-left">Average Rating</th>
                                    <th class="text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($films as $index => $film)
                                        @include('admin.film_row')
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
    
</x-admin.app-layout>

