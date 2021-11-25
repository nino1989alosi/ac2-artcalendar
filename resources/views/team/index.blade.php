<x-base-layout>
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.manageTeam_Title') }}</b></h3>

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
                                    <a href="#" title="AGGIUNGI" class="btn btn-primary font-weight-bolder btn-go" id="openAdd">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>{{__('dictionary.add') }}</a>
                                    </select>
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
                        <th class="min-w-120px">{{__('dictionary.ownerTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.membercountTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.actionsTh') }}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($teams as $c)
                    <tr>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->ownername }}</td>
                        <td>{{ $c->count }}</td>

                        <td>

                        <a href="{{ route('team_edit', $c->id)}}" title="MODIFICA" class="btn btn-upd btn-table">
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
<div class="modal fade" id="modalAdd" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">{{ __('dictionary.newTeam') }}</span>

                </div>
                <form method="POST" action="{{ route('team.save') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
               


                    <div class="col-md-12">
                        <div class="row">                           
                                
                        
                        <div class="row mb-12">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.name') }}  </label>
                                <!--end::Label-->

                                <div class="col-lg-8 fv-row">
                                <input type="text" name="team" >
                                </div>
                            </div>
                    </div>
                </div>
            </div>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeAdd" >{{__('dictionary.cancel') }}</button>
              <button type="submit" class="btn btn-primary" id="btn-save">
                <span>{{__('dictionary.save') }}</span>
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
                                        <h5>{{__('dictionary.remove') }} {{__('dictionary.lblTeam') }}</h5>
                                        <h5 id="mediaIdRemove" hidden></h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblTeam') }} ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
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
  <script src="{{ asset('js/teams.js') }}" defer></script>
  @endsection



</x-base-layout>






