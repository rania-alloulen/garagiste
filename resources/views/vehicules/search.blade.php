<div class="m-5">

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
    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
    </div>
@endif
<div class="card-body">
    <table class="table table-striped table-hover mt-10">
        <tr style="background-color: #0B4C80; color: white;">
            <th>@lang('Marque')</th>
            <th>@lang('Modele')</th>
            <th>@lang('typeFuel')</th>
            <th>@lang('Registration')</th>
            <th>@lang('Image')</th>
            <th>@lang('Action')</th>
        </tr>
        @foreach ($vehicules as $v)
            <tr id="row{{$v->id}}" style="background-color: #E3F2FD;">
                <td>{{ $v->marque}}</td>
                <td>{{ $v->modele}}</td>
                <td>{{ $v->typeFuel }}</td>
                <td>{{ $v->registration }}</td>
                <td><img src="{{ asset('images/' . $v->image) }}" alt="Image du Véhicule" style="width: 100px; height: 1o0px;"></td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btnShow btn btn-info" v='{{$v->id}}'>@lang('Voir')</button>
                        <a href="{{ route('vehicules.edit',$v->id) }}" class="btn btn-primary">@lang('Modifier')</a>
                        <button type="button" class="btnDelete btn btn-danger" v="{{$v->id}}">{{ trans('Supprimer')}}</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>




<script>
    $(document).on('click',".btnShow",function(){
        var vehicule_id = $(this).attr('v');
        var myData = {'vehicule_id': vehicule_id};
        var url = '{{ route("vehicules.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showV").html(response.data);
                $("#myModalShowV").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteV").show();
        })
</script>
