<table class="tbl-reseravtion">
    <tr>
        <th>id</th>
        <th>nbr_place</th>
        {{-- <th>Départ</th>
        <th>Destination</th>
        <th>Nombre de place</th>
        <th>Modifier</th>
        <th>Annuler</th> --}}
    </tr>
    @foreach ($reservation as $item)
        <tr class="anima">
        <td>{{$item->user_id}}</td>
        <td>{{$item->nbr_place}}</td>
        </tr>
    @endforeach
</table>