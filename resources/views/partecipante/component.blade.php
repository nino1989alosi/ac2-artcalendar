
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.managePartecipants_Title') }}</b></h3>

            <div>
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="{{__('dictionary.search') }}" id="kt_datatable_search_query"/>
                                        <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                     </span>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2 my-md-0">
                                    <a href="#" id="openAddPartecipant" title="AGGIUNGI" class="btn btn-primary font-weight-bolder btn-go">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>{{__('dictionary.add') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>




            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4  tab-gen">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">

                        <th class="min-w-120px">{{__('dictionary.nameTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.emailTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.genderTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.phoneTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.actionsTh') }}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($partecipants as $c)
                    <tr>
                        <td>{{ $c->fullname }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->sesso }}</td>
                        <td>{{ $c->telefono }}</td>
                        

                        <td>

                        <a href="#" title="MODIFICA" class="btn btn-updPartecipant btn-table" data-id="{{ $c->id }}">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Modifica') }}
                        </a>

                       
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">{{__('dictionary.noRecord') }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>





<!-- NEW -->
<div class="modal fade" id="modalAddPartecipant" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">{{__('dictionary.addPartecipant') }}</span>
                    <h5 id="eventPartecipantId" hidden>{{ $element->id }}</h5>
                    <button type="button" style="float:right;color:white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.fullname') }}</label>
                                    <input type="text" id="fullname" class="form-control" >
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.email') }}</label>
                                    <input type="text" id="email" class="form-control" >
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.sesso') }}</label>
                                    <select name="sesso" id="sesso">
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                   
                                </div>                                                        
                    </div>                  
                </div>



                <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.telefono') }}</label>
                                    <input type="text" id="telefono" class="form-control" >
                                   
                                </div>

                                                                                   
                    </div>                  
                </div>





            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeAddPartecipant">Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-savePartecipant">
                <span>Salva</span>
              </button>
            </div>
          </div>

        </div>
      </div>




      <!-- UPDATE -->
<div class="modal fade" id="modalUpdatePartecipant" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">{{__('dictionary.updatePartecipant') }}</span>
                    <h5 id="pId" hidden></h5>
                    <button type="button" style="float:right;color:white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.fullname') }}</label>
                                    <input type="text" id="fullnameUPD" class="form-control" >
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.email') }}</label>
                                    <input type="text" id="emailUPD" class="form-control" >
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.sesso') }}</label>
                                    <select name="sesso" id="sessoUPD">
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                   
                                </div>                                                        
                    </div>                  
                </div>



                <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label for="title">{{__('dictionary.telefono') }}</label>
                                    <input type="text" id="telefonoUPD" class="form-control" >
                                   
                                </div>

                                                                                   
                    </div>                  
                </div>





            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeUPDPartecipant">Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-saveUPDPartecipant">
                <span>Salva</span>
              </button>
            </div>
          </div>

        </div>
      </div>




    </div>




<script type="text/javascript">

$( document ).ready(function() {


$( "#openAddPartecipant" ).click(function() {
    $('#modalAddPartecipant').modal('toggle');
  });

  $( "#closeAddPartecipant" ).click(function() {
    $('#modalAddPartecipant').modal('toggle');
  });




  $('body').on('click', '.btn-updPartecipant', function() {
      var pid = $(this).data('id');
        $('#pId').text(pid);
        $('#pId').val(pid);


        jQuery.ajax('/edit_partecipant',
        {
            method: 'POST',
            data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
                "id":  pid
            },
    
            complete: function (resp) {
                var result = JSON.parse(resp.responseText);

                console.log(JSON.stringify(result));
                console.log('full: ' + result.data.fullname);

                if(result.code){
                    $('#modalUpdatePartecipant').modal('toggle');
                    $('#fullnameUPD').val(result.data.fullname);
                    $('#emailUPD').val(result.data.email);
                    $('#sessoUPD').val(result.data.sesso);
                    $('#telefonoUPD').val(result.data.telefono);

                    
                }
                   
            }
        });



       
        

    });




  $( "#closeUPDPartecipant" ).click(function() {
    $('#modalUpdatePartecipant').modal('toggle');
  });
  


  $( "#btn-savePartecipant" ).click(function() {        
        jQuery.ajax('/new_partecipant',
        {
            method: 'POST',
            data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
                "email":  $('#email').val(),
                "fullname": $('#fullname').val(),
                "sesso": $('#sesso').val(),
                "telefono": $('#telefono').val(),
                "eventPartecipantId":  $('#eventPartecipantId').text()

    
            },
    
            complete: function (resp) {
                var result = JSON.parse(resp.responseText);

                console.log(JSON.stringify(result));

                if(result.code){
                    $('#modalAdd').modal('toggle');
                    location.reload();
                }
                else{
                    $('#box-error').css('display','block');
                }           
            }
        });
  });




  $( "#btn-saveUPDPartecipant" ).click(function() {        
        jQuery.ajax('/update_partecipant',
        {
            method: 'POST',
            data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": $('#pId').text() != "" ?  $('#pId').text() :  $('#pId').val(),
                "email":  $('#emailUPD').val(),
                "fullname": $('#fullnameUPD').val(),
                "sesso": $('#sessoUPD').val(),
                "telefono": $('#telefonoUPD').val()

    
            },
    
            complete: function (resp) {
                var result = JSON.parse(resp.responseText);

                console.log(JSON.stringify(result));

                if(result.code){
                    $('#modalUpdate').modal('toggle');
                    location.reload();
                }
                else{
                    $('#box-error').css('display','block');
                }           
            }
        });
  });



}); 

</script>














