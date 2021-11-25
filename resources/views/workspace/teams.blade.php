<x-base-layout>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/workspaces.js') }}" type="text/javascript"></script>

<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>Manage Your Team</b></h3>

            <div>
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Cerca..." id="kt_datatable_search_query"/>
                                        <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                     </span>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>



                </div>
            </div>




            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4  tab-gen">

            <thead>
                <tr>
                    <th>{{__('dictionary.fullnameTh') }}</th>
                    <th>{{__('dictionary.roleTh') }}</th>
                    <th>{{__('dictionary.emailTh') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($teams as $w)
                    <tr>
                       
                        <td>{{ $w->name }} </td>
                        <td>{{ $w->role }}</td>
                        <td>{{ $w->email }}</td>


                        <td>


                        <a  data-toggle="modal" href="#formWS" title="MODIFICA" class="btn btn-upd btn-table" data-nome="{{ $w->name }}" data-id="{{ $w->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <label  style="word-wrap:break-word">

                            <a data-toggle="modal" href="#confirmationModal" title="ELIMINA" class="btn btn-remove btn-table" id="{{ $w->id }}">
                                <i class="fas fa-trash-alt fa-delete"></i> 
                            </a>
                        </label>

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
        




     <!-- Modal Delete -->
      <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Remove Worspace</h5>
                    <h5 id="wsIdRemove" hidden></h5>
                </div>
                <div class="modal-body">
                    <h4>Sei sicuro di voler cancellare questo Worspace?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" class="btn btn-danger" id="btnRemove"><i class="fa fa-trash mr-1"></i>Confirm</button>
                </div>
            </div>
        </div>
      </div>




    <div class="modal fade" id="formWS" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">New Workspace</span>
                    <h5 id="wsId" hidden></h5>
                    <button type="button" style="float:right;color:white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group">
                                    <label for="title">Name Workspace</label>
                                    <input type="text" id="name" class="form-control" >
                                   
                                </div>
                            
                            
                        

                    </div>
                </div>
            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-save">
                <span>Salva</span>
              </button>
            </div>
          </div>

        </div>
      </div>
	  
	  </div>
      </div>



</x-base-layout>






