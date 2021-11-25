<script src="{{ asset('js/workspaces.js') }}" type="text/javascript"></script>
@include('includes.error')
            <h3><b>List invites</b></h3>

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

                                <div class="col-md-4 my-2 my-md-0">
                                    <a title="AGGIUNGI" id="sendInvite" href="#" class="btn btn-primary font-weight-bolder btn-go">
                                        </span> {{__('dictionary.sendInvite') }}</a>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
				
				
                <h5 id="wsId" hidden>{{$ws->id}}</h5>

                <h5 id="alertEmailEmpty" hidden>{{__('dictionary.alertEmailEmpty') }}</h5>
                <h5 id="alertRoleEmpty" hidden>{{__('dictionary.alertRoleEmpty') }}</h5>




            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4  tab-gen">
            <thead>
                <tr>
                    <th>{{__('dictionary.guest') }}</th>
                    <th>{{__('dictionary.invitationDate') }}</th>
                    <th>{{__('dictionary.accepted') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($ws->invites as $w)
                    <tr>
                        <td>{{ $w->invite_to }} </td>
                        <td>{{ $w->created_at }}</td>
                        <td>
                            @if($w->status != 0)                      
                            <i class="fa fa-check" aria-hidden="true"></i>
                            @endif
                        </td>


                        <td>


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
                    <h5>{{__('dictionary.remove') }} {{__('dictionary.lblInvites') }}</h5>
                    <h5 id="wsIdRemove" hidden></h5>
                </div>
                <div class="modal-body">
                    <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblInvites') }} ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" class="btn btn-danger" id="btnRemoveInvite"><i class="fa fa-trash mr-1"></i>Confirm</button>
                </div>
            </div>
        </div>
      </div>




    <div class="modal fade" id="formWS" role="dialog" aria-hidden="true"> 
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">{{__('dictionary.sendInviteTitle') }}</span>
                    

                </div>
            <div class="modal-body" id="bodyInvites">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            
                                <div class="form-group col-md-6">
                                    <input type="email" id="email" class="form-control emails" placeholder="Email">
                                   
                                </div>

                                <div class="form-group col-md-3">
                                <select id="role"  class="form-control selRole">
                                    <option value=""> {{__('dictionary.selectArole') }}</option>
                                    <option value="1"> Admin </option>
                                    <option value="2"> Manager </option>
                                    <option value="3"> Promotor </option>
                                    <option value="4"> Collaborator </option>
                                    <option value="5"> Operator </option>
                                </select>
                                </div>

                                <div class="form-group col-md-3">
                                <button type="button" class="btn btn-danger" id="btnAddRow"><i class="fa fa-plus"></i></button>
                                   
                                </div>
                        
                    </div>
                </div>
            </div>

               
                
  
           
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dictionary.cancel') }}</button>
              <button type="submit" class="btn btn-primary" id="btn-sendInv">
                <span>{{__('dictionary.send') }}</span>
              </button>
            </div>
          </div>

        </div>
      </div>
	  

 </div>








