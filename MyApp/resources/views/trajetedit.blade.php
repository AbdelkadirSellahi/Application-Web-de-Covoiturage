<form class="form-horizontal" action="{{ route('trajets.update',$trajet->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="col-xs-4">
            <input name="depart" type="text" id="from" placeholder="depart" class="form-control">
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-4">
            <input name="destination" type="text" id="to" placeholder="destination" class="form-control">
        </div>

    </div>
    <div class="form-group">

        <div class="col-xs-4">
            <input name="date" type="date" placeholder="Date" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-4">
            <input name="prix" type="text" placeholder="Prix" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-4">
            <input name="nbr_place" type="text" placeholder="Nombre de place" class="form-control">
        </div>
    </div>
    <div class="Proposer">
        <button type="submit" class="btn btn-info btn-lg">modifier</button>
    </div>
</form>