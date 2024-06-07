<div class="m-5">
    <a class="btn btn-outline-info btn-lg" href="{{ route('clients.create') }}">
        <i class="fas fa-plus-circle mr-2"></i>@lang('Ajouter un client')
    </a>
    <a href="{{route('generate-pdfc')}}">
        <button class="btn btn-outline-primary btn-lg ml-3">
            <i class="fas fa-file-pdf mr-2"></i>@lang('Télécharger en PDF')
        </button>
    </a>
    <a href="{{ route('clients.export') }}">
        <button class="btn btn-outline-success btn-lg ml-3">
            <i class="fas fa-file-excel mr-2"></i>@lang('Export en Excel')
        </button>
    </a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card-body">
    <table class="table table-striped table-hover mt-3 rounded-lg">
        <thead style="background-color: #0B4C80; color: white;">
            <tr>
                <th>@lang('Nom')</th>
                <th>@lang('Prénom')</th>
                <th>@lang('Adresse')</th>
                <th>@lang('Téléphone')</th>
                <th>@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $clt)
            <tr id="row{{$clt->id}}" style="background-color: #E3F2FD;">
                <td>{{ $clt->nom}}</td>
                <td>{{ $clt->prenom}}</td>
                <td>{{ $clt->adresse }}</td>
                <td>{!! $clt->telephone !!}</td>
                <td>
                    <button class="btnShow btn bg-info text-white font-bold px-3 py-2 rounded-lg" v="{{$clt->id}}">@lang('Voir')</button>
                    <a class="btnEdit btn bg-primary text-white font-bold px-3 py-2 rounded-lg" href="{{ route('clients.edit',$clt->id) }}">@lang('Modifier')</a>
                    <button class="btnDelete btn bg-danger text-white font-bold px-3 py-2 rounded-lg" v="{{$clt->id}}">@lang('Supprimer')</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).on('click',".btnShow",function(){
        var client_id = $(this).attr('v');
        var myData = {'client_id': client_id};
        var url = '{{ route("clients.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showClient").html(response.data);
                $("#myModalShowClient").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteClient").show();
        })
</script>
