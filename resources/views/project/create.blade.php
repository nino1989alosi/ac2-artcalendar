<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.createProject') }}</span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">
                    {{__('dictionary.detailTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">
                    {{__('dictionary.organizationTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">
                    {{__('dictionary.eventsTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_4">
                    {{__('dictionary.documentsTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.mediaTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_6">
                    {{__('dictionary.notesTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_7">
                    {{__('dictionary.usersTab') }}</a>
                </li>
            </ul>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">


                <!--begin::Tap pane kt_table_widget_5_tab_1-->
                <div class="tab-pane fade active show" id="kt_table_widget_5_tab_1">
                    <!--begin::Table container-->
                    <!--begin::Content-->
							<div id="kt_account_profile_details" class="collapse show">
								<!--begin::Form-->
								<form method="POST" action="{{ route('new.project') }}" enctype="multipart/form-data">
										@csrf
									<div class="card-body border-top p-9">
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8">
												<!--begin::Image input-->
												<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(https://preview.keenthemes.com/metronic8/laravel/demo4/media/avatars/blank.png)">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper w-125px h-125px" style="background-image: url(https://lh3.googleusercontent.com/a/AATXAJxAQp6B8uj1nvWW2G9JG3M0sJAxP30LKAwLSxQn=s96-c);"></div>
													<!--end::Preview existing avatar-->

													<!--begin::Label-->
													<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
														<i class="bi bi-pencil-fill fs-7"></i>

														<!--begin::Inputs-->
														<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
														<input type="hidden" name="avatar_remove">
														<!--end::Inputs-->
													</label>
													<!--end::Label-->

													<!--begin::Cancel-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
													<!--end::Cancel-->

													<!--begin::Remove-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
													<!--end::Remove-->
												</div>
												<!--end::Image input-->

												<!--begin::Hint-->
												<div class="form-text"> {{__('dictionary.formatFileAllowed') }}  file types: png, jpg, jpeg.</div>
												<!--end::Hint-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->

										<!--begin::Input group FIELD -->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.name') }} </label>
											<!--end::Label-->

											<div class="col-lg-8 fv-row">
												<input type="text" name="name" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.name') }}" value="{{ old('firstname')  }}">
											</div>
										</div>
										<!--end::Input group-->



										 <!--begin::Input group FIELD -->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.code') }} </label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="code" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.code') }}" value="{{ old('lastname')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



                                        <!--begin::Input group-->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.status') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<select name="status" id="status" class="form-control form-control-lg form-control-solid">
													<option value="1">{{__('dictionary.active') }}</option>
													<option value="2">{{__('dictionary.closed') }}</option>
													<option value="3">{{__('dictionary.transfered') }}</option>
													<option value="4">{{__('dictionary.failed') }}</option>
													<option value="5">{{__('dictionary.suspended') }}</option>
													<option value="6">{{__('dictionary.cancelled') }}</option>
													</select>                    
												</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
                                    
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.startDT') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
                                            <input type="date" class="form-control form-control-lg form-control-solid" name="startDT" >											
                                        </div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->




                                        	<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
                                    
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.endDT') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
                                            <input type="date" class="form-control form-control-lg form-control-solid" name="endDT" >											
                                        </div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->


                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.website') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="website" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.website') }}" value="{{ old('nickname')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



										<input type="text" name="wId" id="wId" required class="form-control form-control-lg form-control-solid" hidden>



										 <!--begin::Input group-->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.description') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="description" rows="4" cols="100" value="{{ old('description')  }}"></textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->








									   
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
								<div></div></form>
								<!--end::Form-->
							</div>
							<!--end::Content-->

                </div>
                <!--end::Body-->
	
	
	
	
	
	
	
	
	
	
	
	
	
	                

</div>
</div>
</div>


@section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script type="text/javascript">

$('#wId').val($('#selWS').val());
$('#tag').select2({
        width: '100%',
        placeholder: "Select an Option",
        tags: true,
        allowClear: true,
        ajax: {
            url: '/api/tags'
        },
        createTag: function (params) {
                var term = $.trim(params.term);

                if (term === '') {
                return null;
                }
                

                return {
                                id: result.data.id,
                                text: result.data.text,
                                newTag: true 
                                }
                /*  jQuery.ajax('/api/tags/create',
                {
                    method: 'POST',
                    data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                        "name": term
            
                    },
            
                    complete: function (resp) {
                        var result = JSON.parse(resp.responseText);
    
                        console.log(result.code);
    
                        if(result.code){

                          $('#tag').val(result.data.text).trigger('change');
                            var x = {
                                id: result.data.id,
                                text: result.data.text,
                                newTag: true 
                                };

                                console.log(JSON.stringify(x));

                            return {
                                id: result.data.id,
                                text: result.data.text,
                                newTag: true 
                                }
    
                        }*/
                        

                        
                    
                    }
                });




      $('#type').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
      });



      $('#group').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
      });



      $('#company').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
      });


</script>


@endsection

</x-base-layout>






