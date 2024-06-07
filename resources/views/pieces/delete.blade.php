<div id="myModalDeleteP" class="modal">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <span class=" btnClose close">&times;</span>
        <h2>@lang('Supprimer')</h2>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <form id="deleteForm" onsubmit="return submitDeleteForm(event)">
                    @csrf
                    <input type="hidden" value="" id="txtId" name="txtId" />
                </form>
                  <strong>@lang('Vous ete sur de supprimer cette piece ?')</strong>
              </div>
          </div>
          
      </div>

      </div>
      <div class="modal-footer">
        <button  class="btnYes  text-black bg-red-600 font-bold py-2 px-4 rounded" id="close">@lang('oui supprimer !')</button>
        <button  class="btnClose  text-black bg-green-700 font-bold py-2 px-4 rounded" id="close">@lang('Fermer')</button>
      </div>
    </div>
  </div>
  <script>
        $(".btnClose").on('click',function(){
            $("#myModalDeleteP").hide();
        })

        $(".btnYes").on('click',function(){
            var formData=$('#deleteForm').serialize();
            console.log(formData);
            var url="{{route('pieces.delete')}}";
            axios.post(url, formData).then(response=>{
                if(response.data=="ok"){
                    $("#myModalDeleteP").hide();
                    $("#row"+$("#txtId").val()).remove();
                }
                else{
                    alert("error")
                }
            }).catch(error=>{
                    console.log(error);
            });

            
        })
  </script>