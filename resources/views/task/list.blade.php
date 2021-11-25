<!--begin::Entry-->
<x-base-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/tasks.js') }}" type="text/javascript"></script>


    <div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container-fluid">
								<!--begin::Todo-->
								<div class="d-flex flex-row">

									<!--begin::List-->
									<!--begin::List Widget 3-->
<div class="card tasks">
    <!--begin::Header-->
    <div class="card-header border-0">
        <h3 class="card-title fw-bolder text-dark">Task</h3>

        <div class="card-toolbar" style="width:100%">

                            <div class="row">
                                <div class="col-md-8 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Cerca..." id="kt_datatable_search_query"/>
                                        <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                     </span>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2 my-md-0">
                                    <a  title="AGGIUNGI" id="openAdd" href="#" class="btn btn-primary font-weight-bolder btn-go">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>New</a>
                                    </select>
                                </div>
                            </div>
                  

    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-2">

    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4  tab-gen">
    <tr>
        <th></th>
        <th>Titolo </th>
        <th>Descrizione</th>
        <th>Scadenza </th>
        <th>Owner</th>
        <th>Stato</th>
        <th>Actions</th>
</tr>
<tbody>
@forelse ($tasks as $row)
    <tr>
        <td><span class="bullet bullet-vertical h-40px" style="background-color:{{ $row->color}}"></span></td>
        <td>{{ $row->titolo }} </td>
        <td>{{ $row->descrizione }}</td>
        <td>Scadenza in {{ $row->scadenza }}</td>
        <td>{{ $row->owner }}</td>


        <td><label class="btnstatus" data-id="{{ $row->id }}" style="cursor:pointer;background-color:{{ $row->color}}; color:white;font-weight:bold;padding:5px;border-radius:5px;">{{ $row->stato }}</label></td>

        

                <td>
                    <a href="{{ route('task_edit', $row->id)}}" title="{{__('dictionary.edit') }}" class="btn btn-upd btn-table">
                            <i class="fas fa-pencil-alt"></i>
                            {{__('dictionary.edit') }}
                        </a>



        </td>
    </tr>
@empty
    <tr>
        <td colspan="100%">{{ __('Non ci sono Record') }}</td>
    </tr>
@endforelse
</tbody>
<tfoot>

</tfoot>
</table>


<!-- STATO -->
<div class="modal fade" id="modalStatus" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">Update Status</span>

                </div>
            <div class="modal-body">
                <div class="row">

                <div class="col-md-12">
                        <div class="row">
                            
                                
                        <input type="text" id="tId" class="form-control" hidden >             
                                <div class="form-group col-md-12">
                                    <label >{{__('dictionary.status') }}</label>
                                    <select name="stato" id="stato" class="form-control form-control-lg form-control-solid">
                                            <option value=""></option>
                                            <option value="0">Pending</option>
                                            <option value="1">In Progress</option>
                                            <option value="2">suspended</option>
                                            <option value="3">cancelled</option>
                                            <option value="4">done</option>
									</select>   
                                   
                                </div>


                                
 
                    </div>
                </div>






            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeStatus" >Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-save-status">
                <span>Salva</span>
              </button>
            </div>
          </div>
        </div>
      </div>









<!-- NEW -->
<div class="modal fade" id="modalAdd" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">New Task</span>

                </div>
            <div class="modal-body">
                <div class="row">



                    <div class="col-md-12">
                        <div class="row">                           
                                <div class="form-group col-md-4">
                                    <label class="required">{{__('dictionary.title') }}</label>
                                    <input type="text" id="titolo" class="form-control" >                                  
                                </div>
                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.descrizione') }}</label>
                                    <input type="text" id="descrizione" class="form-control" >                                  
                               </div>
                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.utentiassegnati') }}</label>
                                    <select name="entity_id" id="utentiassegnati" class="form-control form-control-lg form-control-solid">
                                            <option value=""></option>
                                            @foreach ($users as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                            @endforeach 
									</select>   
                                   
                                </div>
                    </div>
                </div>



<br>
                <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.scadenza') }}</label>
                                    <input type="date" class="form-control form-control-lg form-control-solid" id="scadenza" >


                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.priorita') }}</label>
                                    <select name="groups[]" id="priority" class="form-control form-control-lg form-control-solid">
                                            <option value=""></option>
                                            <option value="0">Critical</option>
                                            <option value="1">High</option>
                                            <option value="2">Medium</option>
                                            <option value="3">Low</option>
                                            <option value="4">Important</option>
									</select>   
                                   
                                </div>


                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.gruppiassegnati') }}</label>
                                    <select name="groups" id="gruppiassegnati" class="form-control form-control-lg form-control-solid">
                                            <option value=""></option>
                                            @foreach ($groups as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                            @endforeach 
									</select>   
                                   
                                </div>
                    </div>
                </div>









                <br>

                <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label >{{__('dictionary.note') }}</label>
                                    <textarea id="note" class="form-control form-control-lg form-control-solid" name="note" rows="4" cols="100" value="{{ old('note')  }}"></textarea>

                                   
                                </div>

                                
                    </div>
                </div>





            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeAdd" >Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-save">
                <span>Salva</span>
              </button>
            </div>
          </div>
        </div>
      </div>







        

          
        
    </div>
    <!--end::Body-->
</div>
<!--end:List Widget 3-->
									<!--end::List-->
								</div>
								<!--end::Todo-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->




                        </x-base-layout>