
<div id="myModalShowV" class="modal">
    <!-- Modal content -->
    <div class="modal-content" style="width:700px;">
        <div class="modal-header">
            <span class=" btnCloseShow close">&times;</span>
            <h2>@lang('Show')</h2>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Numero'):</strong>
                    {{$vehicule->id}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Marque'):</strong>
                    {{$vehicule->marque}}

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Model'):</strong>
                    {{$vehicule->modele}}

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Type'):</strong>
                    {{$vehicule->typeFuel}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Registration'):</strong>
                    {{$vehicule->registration}}
                </div>
            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button  class="btnCloseShow  bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" id="close">@lang('Fermer')</button>
        </div>
    </div>

</div>
<script>
       $(".btnCloseShow").on('click',function(){
          $("#myModalShowV").hide();
      })


</script>
