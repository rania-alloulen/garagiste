<div class="m-5">
    <a class="btn btn-outline-secondary btn-lg" href="{{ route('mecaniciens.create') }}">
        <i class="fas fa-plus-circle mr-2"></i>@lang('Ajouter un mécanicien')
    </a>
    <a href="{{route('generate-pdfm')}}">
        <button class="btn btn-outline-primary btn-lg ml-3">
            <i class="fas fa-file-pdf mr-2"></i>@lang('Télécharger en PDF')
        </button>
    </a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-striped table-hover mt-10 rounded-lg">
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
        @foreach ($mecaniciens as $index => $meca)
            <tr style="background-color: #E3F2FD; }}">
                <td>{{ $meca->nom}}</td>
                <td>{{ $meca->prenom}}</td>
                <td>{{ $meca->adresse }}</td>
                <td>{!! $meca->telephone !!}</td>
                <td>
                    <button class="btnShow btn bg-info text-white font-bold px-3 py-2 rounded-lg" v="{{$meca->id}}">@lang('Voir')</button>
                    <a class="btnEdit btn bg-primary text-white font-bold px-3 py-2 rounded-lg" href="{{ route('mecaniciens.edit',$meca->id) }}">@lang('Modifier')</a>
                    <button class="btnDelete btn bg-danger text-white font-bold px-3 py-2 rounded-lg" v="{{$meca->id}}">@lang('Supprimer')</button>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).on('click',".btnShow",function(){
        var mecanicien_id = $(this).attr('v');
        var myData = {'mecanicien_id': mecanicien_id};
        var url = '{{ route("mecaniciens.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showM").html(response.data);
                $("#myModalShowM").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteM").show();
        })
</script>
