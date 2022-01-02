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