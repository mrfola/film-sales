<x-admin.app-layout>

    <x-admin.top-bar/>
    <x-admin.sidebar/>


    <section class="section main-section">
        <h1 class="text-4xl font-black mb-4">Genre List</h1>

        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
    
            @foreach ($genres as $genre)

                <x-admin.card title="{{$genre->name}}" content="{{$genre->films()->get()->count()}}">  
                    <x-slot name="icon">
                        <a href="genres/{{$genre->id}}">
                            <x-button>View</x-button>
                        </a>
                    </x-slot>
                </x-admin.card>
    
            @endforeach

        </div>
      </section>


</x-admin.app-layout>

