<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.createResource') }}</span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">
                    {{__('dictionary.detailTab') }}</a>
                </li>

               
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_4">
                    {{__('dictionary.documentsTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.mediaTab') }}</a>
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
								<form method="POST" action="{{ route('new.resource') }}" enctype="multipart/form-data">
										@csrf
									<div class="card-body border-top p-9">


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
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.location') }} </label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="location" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.location') }}" value="{{ old('location')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->





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




                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.availability') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="number" name="disponibilita" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.availability') }}" value="{{ old('availability')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->


                                        <!--begin::Input group-->
<div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6">Tag</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                    <select name="tags[]" id="tag" class="form-control" multiple="multiple">
                        <option value=""></option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach 
                    </select>                       
                </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->




                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.types') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                    <select name="types[]" id="type" class="form-control" multiple>
                        <option value=""></option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach 
                    </select>     
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->






										<hr>


                                        <!--begin::Input group-->
                                        <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.value') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
                                            <input type="text" name="costo_value" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.value') }}" value="{{ old('value')  }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										



                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.currency') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                            <select name="costo_currency"  class="form-control">
                                                <option value=""></option>
                                              
                                                <option value="EUR">EUR</option>
                                               
                                            </select>                       
                                        </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->




                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.typecosto') }}</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                        <select name="typescosto[]" id="typescosto" class="form-control" multiple>
                                            <option value=""></option>
                                            @foreach ($typescosto as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach 
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
var user_id = '<?php echo Auth()->user()->id?>';

$('#tag').select2({
        width: '100%',
        placeholder: "Select an Option",
        tags: true,
        allowClear: true,
     
});
                
  
$('#tag').on('select2:select', function (e) {
	var term = e.params.data.text;
	jQuery.ajax('/api/tags/create',
                {
                    method: 'POST',
                    data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                        "name": term,
						"workspace_id": workspace_id
            
                    },
            
                    complete: function (resp) {
                        var result = JSON.parse(resp.responseText);
    
                        console.log(result.code);
					}
				});
});


      $('#type').select2({
        width: '100%',
        placeholder: "Select an Option",
		tags: true,
        allowClear: true
      });



	  $('#type').on('select2:select', function (e) {
			var term = e.params.data.text;
			jQuery.ajax('/api/types/create',
						{
							method: 'POST',
							data: {
							"_token": $('meta[name="csrf-token"]').attr('content'),
								"name": term,
								"user_id": user_id
					
							},
					
							complete: function (resp) {
								var result = JSON.parse(resp.responseText);
			
								console.log(result.code);
							}
						});
		});




        $('#typescosto').select2({
        width: '100%',
        placeholder: "Select an Option",
		tags: true,
        allowClear: true
      });



	  $('#typescosto').on('select2:select', function (e) {
			var term = e.params.data.text;
			jQuery.ajax('/api/typescosto/create',
						{
							method: 'POST',
							data: {
							"_token": $('meta[name="csrf-token"]').attr('content'),
								"name": term,
								"user_id": user_id
					
							},
					
							complete: function (resp) {
								var result = JSON.parse(resp.responseText);
			
								console.log(result.code);
							}
						});
		});



</script>


@endsection

</x-base-layout>






