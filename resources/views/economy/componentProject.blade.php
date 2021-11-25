
<div class="row justify-content-center">
        <div class="col-md-12">

            <h3><b>{{__('dictionary.manageFinantial_Title') }}</b></h3>

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
                                    <a href="#" id="openAdd" title="AGGIUNGI" class="btn btn-primary font-weight-bolder btn-go">
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
                    <th class="min-w-120px"></th>
                    <th class="min-w-120px">{{__('dictionary.titleTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.statusTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.paymentTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.valueTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.currencyTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.actionsTh') }}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($finantials as $c)
                    <tr>
                    <td></td>
                        <td>{{ $c->title }}</td>
                        <td>
                            @if($c->status == 1)
                                {{__('dictionary.prepopulated') }}
                            @endif
                            @if($c->status == 2)
                                {{__('dictionary.outstanding') }}
                            @endif
                            @if($c->status == 3)
                                {{__('dictionary.partially') }}
                            @endif
                            @if($c->status == 4)
                                {{__('dictionary.cancelled') }}
                            @endif
                            @if($c->status == 5)
                                {{__('dictionary.refounded') }}
                            @endif
                        </td>
                        <td>
                            @if($c->modePayment == 1)
                                {{__('dictionary.cash') }}
                            @endif
                            @if($c->modePayment == 2)
                                {{__('dictionary.wire') }}
                            @endif
                            @if($c->modePayment == 3)
                                {{__('dictionary.credit') }}
                            @endif
                            @if($c->modePayment == 4)
                                {{__('dictionary.card') }}
                            @endif
                            @if($c->modePayment == 5)
                                {{__('dictionary.coupon') }}
                            @endif
                            @if($c->modePayment == 6)
                                {{__('dictionary.other') }}
                            @endif

                        </td>
                        <td>{{ $c->value }}</td>
                        <td>{{ $c->currency }}</td>
                        

                        <td>

                        <a href="#" title="ELIMINA" class="btn btn-upd btn-table btndelMov" id="{{ $c->id }}">
                            <i class="fas fa-trash-alt fa-delete"></i>
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
<div class="modal fade" id="modalAdd" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">{{__('dictionary.addPartecipant') }}</span>
                    <h5 id="project_id" hidden></h5>
                    <button type="button" style="float:right;color:white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label class="required">{{__('dictionary.title') }}</label>
                                    <input type="text" id="title" class="form-control" >
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.description') }}</label>
                                    <textarea id="descrizione" class="form-control form-control-lg form-control-solid" name="descrizione" rows="4" cols="100" value="{{ old('descrizione')  }}"></textarea>

                                   
                                </div>


                                <div class="form-group col-md-4">
                                    <label class="required">{{__('dictionary.type') }}</label>
                                    <select name="type" id="type">
                                        <option value="IN">{{__('dictionary.guadagni') }}</option>
                                        <option value="OUT">{{__('dictionary.spese') }}</option>
                                    </select>
                                   
                                </div>                                                        
                    </div>                  
                </div>






                <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.status') }}</label>
                                    <select name="status" id="status">
                                        <option value="1">{{__('dictionary.prepopulated') }}</option>
                                        <option value="2">{{__('dictionary.outstanding') }}</option>
                                        <option value="3">{{__('dictionary.partially') }}</option>
                                        <option value="4">{{__('dictionary.cancelled') }}</option>
                                        <option value="5">{{__('dictionary.refounded') }}</option>
                                    </select>
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.modePayment') }}</label>
                                    <select name="modePayment" id="modePayment">
                                    <option value="1">{{__('dictionary.cash') }}</option>
                                        <option value="2">{{__('dictionary.wire') }}</option>
                                        <option value="3">{{__('dictionary.credit') }}</option>
                                        <option value="4">{{__('dictionary.card') }}</option>
                                        <option value="5">{{__('dictionary.coupon') }}</option>
                                        <option value="6">{{__('dictionary.other') }}</option>
                                    </select>
                                   
                                </div>


                                <div class="form-group col-md-2">
                                    <label class="required">{{__('dictionary.value') }}</label>
                                    <input type="text" id="value" class="form-control" >
                                   
                                </div>   
                                
                                
                                <div class="form-group col-md-2">
                                    <label >{{__('dictionary.currency') }}</label>
                                    <select name="currency" id="currency">
                                        <option value="EUR">EUR</option>
                                        <option value="USD">USD</option>
                                        <option value="GBP">GBP</option>
                                        <option value="INR">INR</option>
                                        <option value="JPY">JPY</option>
                                        <option value="CNY">CNY</option>
                                        <option value="NZ2">NZ2</option>
                                    </select>
                                   
                                </div>   
                    </div>                  
                </div>







                <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.expensedate') }}</label>
                                    <input type="date" id="expensedate" class="form-control" >
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.duedate') }}</label>
                                    <input type="date" id="duedate" class="form-control" >
                                   
                                </div>


                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.users') }}</label>
                                    <select name="user" id="user" class="form-control" >
                                        <option value=""></option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach 
                                    </select>         
                                   
                                </div>                                                        
                    </div>                  
                </div>








                <div class="col-md-12">
                        <div class="row">
                            
                               <!--begin::Input group-->
                               <div class="form-group col-md-4">
                                            <label >Tag</label>

                                            <select name="tags[]" id="tag" class="form-control" multiple="multiple">
                                                <option value=""></option>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach 
                                            </select>                       
                                </div>


                                <!--begin::Input group-->
                               <div class="form-group col-md-4">
                                            <label>File</label>
                                            <input type="file" name="document" id="document" class="form-control" >
                                </div>
                                      

                                                                                   
                    </div>                  
                </div>





            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeAdd">Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-save">
                <span>Salva</span>
              </button>
            </div>
          </div>

        </div>
      </div>




      <!-- Modal Delete -->
      <div class="modal fade" id="confirmationModalMov" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5>{{__('dictionary.remove') }} {{__('dictionary.lblMov') }}</h5>
                    <h5 id="movIdRemove" hidden></h5>
                </div>
                <div class="modal-body">
                <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblMov') }} ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeRemoveMov"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="btnRemoveMov"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                </div>
            </div>
        </div>
      </div>



    </div>



    @section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {


$( "#openAdd" ).click(function() {
    $('#modalAdd').modal('toggle');
  });

  $( "#closeAdd" ).click(function() {
    $('#modalAdd').modal('toggle');
  });


  $( "#closeRemoveMov" ).click(function() {
    $('#confirmationModalMov').modal('toggle');
  });




  
  $( "#btnRemoveMov" ).click(function() {
        jQuery.ajax('/finantialdelete',
        {
            method: 'POST',
            data: {
              "_token": $('meta[name="csrf-token"]').attr('content'),
                "id": $('#movIdRemove').text()
    
            },
    
            complete: function (resp) {
                var result = JSON.parse(resp.responseText);

                console.log(JSON.stringify(result));

                if(result.code){
                    $('#box-success').css('display','block');
                    location.reload();
                }
                else{
                    $('#box-error').css('display','block');
                }
               
            }
        });


    });


  $('body').on('click', '.btn-upd', function() {
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

                if(result.code){

                    $('#fullnameUPD').val(result.data.fullname);
                    $('#emailUPD').val(result.data.email);
                    $('#sessoUPD').val(result.data.sesso);
                    $('#telefonoUPD').val(result.data.telefono);

                    $('#modalUpdate').modal('toggle');
                }
                   
            }
        });



       
        

    });





  $( "#btn-save" ).click(function() {       
    if($('#title').val() == '' || $('#value').val() == ''){
        alert('Campi obbligatori mancanti');
        return;
    } 
        jQuery.ajax('/finantial_save',
        {
            method: 'POST',
            data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
                "project_id": $('#project_id').val(),
                "title": $('#title').val(),  
                "descrizione": $('#descrizione').val(),
                "type": $('#type').val(),
                "status": $('#status').val(),
                "modePayment": $('#modePayment').val(),
                "value": $('#value').val(),
                "currency": $('#currency').val(),
                "expensedate": $('#expensedate').val(),
                "duedate": $('#duedate').val(),
                "user": $('#user').val(),
                "tags": $('#tags').val(),

    
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




  $( "#btn-saveUPD" ).click(function() {        
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

  $('body').on('click', '.btndelMov', function() {
            $('#movIdRemove').text($(this).attr("id"));
            $('#movIdRemove').val($(this).attr("id"));
            $('#confirmationModalMov').modal('toggle');
});

}); 

</script>


@endsection













