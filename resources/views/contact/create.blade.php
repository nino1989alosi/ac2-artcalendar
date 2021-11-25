<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.createContact') }}</span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">
                    {{__('dictionary.detailTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_8">
                    {{__('dictionary.emailTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_2">
                    {{__('dictionary.businessTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_3">
                    {{__('dictionary.addressTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_4">
                    {{__('dictionary.personalTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.mediaTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_6">
                    {{__('dictionary.notesTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" disabled href="#kt_table_widget_5_tab_7">
                    {{__('dictionary.settingsTab') }}</a>
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
								<form method="POST" action="{{ route('new.contact') }}" enctype="multipart/form-data">
										@csrf
									<div class="card-body border-top p-9">
										

										<!--begin::Input group FIELD -->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.firstname') }} </label>
											<!--end::Label-->

											<div class="col-lg-8 fv-row">
												<input type="text" name="firstname" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.firstname') }}" value="{{ old('firstname')  }}">
											</div>
										</div>
										<!--end::Input group-->



										 <!--begin::Input group FIELD -->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.lastname') }} </label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="lastname" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.lastname') }}" value="{{ old('lastname')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.nickname') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="nickname" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.nickname') }}" value="{{ old('nickname')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->


                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.email') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="email" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.email') }}" value="{{ old('nickname')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->




										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.pphone') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="tell" name="pphone" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.pphone') }}" value="{{ old('pphone')  }}">

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






