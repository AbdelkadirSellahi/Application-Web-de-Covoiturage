<form action="{{route('reservations.store')}}" method="POST">
    @csrf
@foreach($trajets as $item)
<input type="text" name="trajet_id" value="{{$item->id}}" hidden>
@endforeach
    <input type="text" name="nbr_place">
    <td><button type="submit" class="btn">reserver</button></td>
</form>