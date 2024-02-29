
<form action="{{route('tauxdegains.update','tauxdegains->id')}}" method="POST">
@csrf
@method('PUT')
<input name="pourcentage">
<input name="user_id" value="{{Auth::user()->id}}" hidden>
<button type="submit">modifier</button>
</form>
