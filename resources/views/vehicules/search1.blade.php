@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show mt-10" role="alert">
    <strong>@lang('Whooops ') </strong>@lang('Veuillez remplir tous les champs.')
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<table class="table table-striped table-hover mt-10">
<thead style="background-color: #0B4C80; color: white;">
    <tr>
        <th>ID</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Type de Fuel</th>
        <th>Immatriculation</th>
        <th>Image</th>
        <th>Nom du client</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($vehicules as $vehicule)
        <tr id="row{{ $vehicule->id }}"style="background-color: #E3F2FD;">
            <td>{{ $vehicule->id }}</td>
            <td>{{ $vehicule->marque }}</td>
            <td>{{ $vehicule->modele }}</td>
            <td>{{ $vehicule->typeFuel }}</td>
            <td>{{ $vehicule->registration }}</td>
            <td><img src="{{ asset('images/' . $vehicule->image) }}" alt="Image du véhicule" style="width: 100px;"></td>
            <td>{{ $vehicule->client->nom ?? 'N/A' }} {{ $vehicule->client->prenom }}</td>

                <td>
                    <div class="d-flex">
                        <a class="btnEdit btn bg-primary text-white font-bold px-3 py-2 rounded-lg" href="{{ route('vehicules.edit2', $vehicule->id) }}">@lang('Modifier')</a>
                        <button class="btnDelete btn bg-danger text-white font-bold px-3 py-2 rounded-lg" v="{{$vehicule->id}}">{{ trans('Supprimer')}}</button>
                    </div>

                </td>

        </tr>
    @endforeach
</tbody>
</table>

<script>
 $(document).on("click",".btnDelete",function(){
$("#txtId").val($(this).attr('v'));
$("#myModalDeleteV").show();
})
</script>

</section>
</div>


