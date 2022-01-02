<x-admin.app-layout>

    <x-admin.top-bar/>

  <div class="container max-w-7xl mx-auto">

            <div class="" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
            <div class="px-6 py-12 bg-white border-b border-gray-200">
                <!-- message -->
                <p class="text-center">{{session()->get('message')}}</p>

                <h1 class="text-4xl font-black mb-4">Film List</h1>
                
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

