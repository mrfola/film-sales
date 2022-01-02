<tr style="border-bottom-width:1px;">
    <td class="text-left py-2" >{{$index+1}}</td>
    <td class="text-left" >{{$film->name}}</td>
    <td class="text-left"># {{$film->price}}</td>
    <td class="text-left"><?php // $genre = $film->genre()->first()->name; ?></td>
    <td class="text-left">{{$film->average_rating}}</td>
    <td>
        <a href="/admin/films/{{$film->id}}">
            <x-button class="my-1.5 normal-case" style="background: #146AB5; font-size:0.8em; font-weight:normal; padding: 0.6em 1.5em;">
                {{ __('View') }}
            </x-button><br>
    </td>
</tr>