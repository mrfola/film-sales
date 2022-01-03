<x-admin.app-layout>

    <x-admin.top-bar/>
    <x-admin.sidebar/>

    <div class="container max-w-7xl mx-auto">
        <div class="card-content" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="px-6 py-12 bg-white border-b border-gray-200">
                    <!-- message -->
                    <p class="text-center">{{session()->get('message')}}</p>

                    <h1 class="text-4xl font-black mb-4">Genre: {{$genre_name}}</h1>

                    <div style="width:100%">
                        @if (($films) && (count($films) > 0))

                            <table class="table-fixed w-full">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="text-left">#</th>
                                        <th class="text-left">Name</th>
                                        <th class="text-left">Price</th>
                                        <th class="text-left">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($films as $index => $film)
                                            @include('admin.genre_row')
                                        @endforeach
                                </tbody>                        
                            </table>

                        @else
                            <h2 class="text-2xl font-black mb-4 text-center">This genre has no film yet</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-admin.app-layout>

