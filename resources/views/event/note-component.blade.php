
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('noteEvent.save') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body border-top p-9">
                            
                        <input type="text" name="eventIdNote" value="{{ $element->id }}" hidden>


                             <!--begin::Input group-->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.text') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<textarea id="text" class="form-control form-control-lg form-control-solid" name="text" rows="4" cols="100" value="{{ old('text')  }}"></textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->





          

<hr>


                            <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">


                            <!--begin::Table body-->
                            <tbody>
                            @forelse ($notes as $w)
                                <tr>
                                    <td>{{ $w->name }} <br>
                                        {{ $w->data }}  
                                    </td>
                                    <td>{{ $w->testo}}</td>
                                    
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
                                        <h5>{{__('dictionary.remove') }} {{__('dictionary.lblOperator') }}</h5>
                                        <h5 id="mediaIdRemove" hidden></h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblOperator') }} ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="btnRemoveCloseMedia"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                                        <button type="button" class="btn btn-danger" id="btnRemoveMedia"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
                        </div>	
                    
                <!--end::Tap pane-->