<div class="m-5">
    <a class="btn btn-outline-secondary btn-lg" href="{{ route('pieces.create') }}">
        <i class="fas fa-plus-circle mr-2"></i>@lang('Ajouter une pièce')
    </a>
    <a href="{{route('generate-pdfp')}}">
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
            <th>@lang('Nom pièce')</th>
            <th>@lang('Référence')</th>
            <th>@lang('Fournisseur')</th>
            <th>@lang('Prix')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pieces as $p)
            <tr id="row{{$p->id}}" style="background-color: #E3F2FD;">
                <td>{{ $p->nompiece}}</td>
                <td>{{ $p->referencep}}</td>
                <td>{{ $p->fournisseur }}</td>
                <td>{!! $p->prix !!}</td>
                <td>
                    <button class="btnShow btn bg-info text-white font-bold px-3 py-2 rounded-lg" v="{{$p->id}}">@lang('Voir')</button>
                    <a class="btnEdit btn bg-blue-500 hover:bg-blue-400 text-white font-bold px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{ route('pieces.edit',$p->id) }}">@lang('Modifier')</a>
                    <button class="btnDelete btn bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$p->id}}">@lang('Supprimer')</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).on('click',".btnShow",function(){
        var piece_id = $(this).attr('v');
        var myData = {'piece_id': piece_id};
        var url = '{{ route("pieces.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showP").html(response.data);
                $("#myModalShowP").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteP").show();
        })
</script>
