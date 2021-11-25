
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/media.js') }}" type="text/javascript"></script>

<!-- MEDIA TAB -->
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('mediaGroup.save') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body border-top p-9">
                            
                        <input type="text" name="groupId" value="{{ $group->id }}" hidden>
                            <!--begin::Input group FIELD -->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> Media </label>
                                <!--end::Label-->

                                <div class="col-lg-8 fv-row">
                                    <input type="file" id="img" name="media" required class="form-control form-control-lg form-control-solid">
                                </div>
                            </div>
                            <!--end::Input group-->

                            <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="border-0">
                                <th>{{__('dictionary.fileTh') }}</th>
                                <th>{{__('dictionary.createdTh') }}</th>
                                <th>{{__('dictionary.actionsTh') }}</th>
                                    <th></th>
                              </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                            @forelse ($media as $w)
                    <tr>
                        <td>{{ $w->media_name }} </td>
                        <td>{{ $w->created_at}}</td>
                        <td>

                            <a title="ELIMINA" class="btn btn-remove btn-table btndeletemedia" data-id="{{ $w->id }}">
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
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->



                         
                        
                        </div>
                        <!--end::Card body-->

                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">{{__('dictionary.cancel') }}</button>

                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                                <!--begin::Indicator-->
                                <span class="indicator-label">
                                {{__('dictionary.save') }}
                                </span>
                                <span class="indicator-progress">
                                {{__('dictionary.waiting') }} 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator-->
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
               
				
				
				
				<!-- Modal Delete -->
                        <div class="modal fade" id="confirmationModalMedia" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>{{__('dictionary.remove') }} {{__('dictionary.lblMedia') }}</h5>
                                        <h5 id="mediaIdRemove" hidden></h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblMedia') }} ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="btnRemoveCloseMedia"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                                        <button type="button" class="btn btn-danger" id="btnRemoveMediaGroup"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
                        </div>	
                    
                <!--end::Tap pane-->