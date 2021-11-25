<x-base-layout>
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.manageDocument_Title') }}</b></h3>

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
                                    <a  title="AGGIUNGI" id="openAdd" href="#" class="btn btn-primary font-weight-bolder btn-go">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>New</a>
                                   
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


                    <th>{{__('dictionary.nameTh') }}</th>
                    <th>{{__('dictionary.createdTh') }}</th>
                    <th>{{__('dictionary.authorTh') }}</th>
                    <th class="text-center">{{__('dictionary.actionsTh') }}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($documents as $c)
                    <tr>
                        <td>{{ $c->filename }}</td>
                        <td>{{ $c->created_at }}</td>
                        <td>{{ $c->ownername  }}</td>

                        <td class="text-center">

                        <label  style="word-wrap:break-word">

                            <a href="#" title="ELIMINA" class="btn btn-remove btn-table btndeletedoc" data-entita="{{ $c->entity_id }}" id="{{ $c->id }}">
                                <i class="fas fa-trash-alt fa-delete"></i> 
                            </a>
                        </label>


                        <a href="{!! route('document.download', $c->path) !!}"  class="btn btn-table btndownloaddoc" title="DOWNLOAD"><i class="fa fa-download" aria-hidden="true"></i></a>
                        


                        </td>
                    </tr>
                @empty
                    <tr>
                    
                        <td colspan="100%">{{ __('dictionary.noRecord') }}</td>
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
                        <span style="float:left;color:white"  id="span-title">{{ __('dictionary.newDocument') }}</span>

                </div>
                <form method="POST" action="{{ route('document.save') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
               


                    <div class="col-md-12">
                        <div class="row">                           
                                
                       
                        <div class="row mb-12">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> Media </label>
                                <!--end::Label-->

                                <div class="col-lg-8 fv-row">
                                    <input type="file" id="img" name="media" required class="form-control form-control-lg form-control-solid">
                                </div>
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
			</form>
          </div>
        </div>
      </div>






        
       <!-- Modal Delete -->
       <div class="modal fade" id="confirmationModalMedia" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>{{__('dictionary.remove') }} {{__('dictionary.lblDocument') }}</h5>
                                        <h5 id="mediaIdRemove" hidden></h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4 id="confirmText">{{__('dictionary.confirmRemove') }}{{__('dictionary.lblDocument') }} ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="btncloseRemove" data-dismiss="modal"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                                        <button type="button" class="btn btn-danger" id="btnRemove"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>




    </div>



    @section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script src="{{ asset('js/document.js') }}" defer></script>


@endsection

</x-base-layout>






