<tr style="border-bottom-width:1px;">
    <td class="text-left py-2" >{{$index+1}}</td>
    <td class="text-left" >{{$user->name}}</td>
    <td class="text-left"> {{$user->lastFilmBought()}}</td>
    <td class="text-left"> {{$user->getAge()}}</td>
    <td class="text-left"> {{$user->noOfPurchases()}}</td>
</tr>