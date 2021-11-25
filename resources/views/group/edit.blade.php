<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.editGroup') }}</span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">
                    {{__('dictionary.detailTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.mediaTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_3">
                    {{__('dictionary.documentsTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_2">
                    {{__('dictionary.projectsTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_9">
                    {{__('dictionary.eventsTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_4">
                    {{__('dictionary.tasksTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_6">
                    {{__('dictionary.notesTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_7">
                    {{__('dictionary.settingsTab') }}</a>
                </li>
            </ul>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">



                <!--  TAB DOCS -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('document/componentGroup', compact('MyDocuments','documents', 'element')) }}	
                    </div>
                </div>
	                <!-- FINE TAB DOCS -->




                <!--begin::Tap pane kt_table_widget_5_tab_1-->
                <div class="tab-pane fade active show" id="kt_table_widget_5_tab_1">
                    <!--begin::Table container-->
                    <!--begin::Content-->
							<div id="kt_account_profile_details" class="collapse show">
								<!--begin::Form-->
								<form method="POST" action="{{ route('new.group') }}" enctype="multipart/form-data">
										@csrf
									<div class="card-body border-top p-9">
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
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
														<input type="file" name="logo" accept=".png, .jpg, .jpeg">
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
												<input type="text" name="name" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.name') }}" value="{{ $group->name }}">
											</div>
										</div>
										<!--end::Input group-->



										 







										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.website') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="text" name="website" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.website') }}" value="{{ $group->website }}">

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
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="description" rows="4" cols="100" value="{{ $group->description }}">{{ $group->description }}</textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->

                                        <input type="text" name="id" hidden class="form-control form-control-lg form-control-solid" value="{{ $group->id  }}">




										 <!--begin::Input group-->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.status') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<select name="status" id="status" required class="form-control form-control-lg form-control-solid">
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
															<label class="col-lg-4 col-form-label  fw-bold fs-6">Tag</label>
															<!--end::Label-->

															<!--begin::Col-->
															<div class="col-lg-8 fv-row">
															<select name="tag" id="tag" class="form-control" multiple="multiple">
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
											<select name="type" id="type" class="form-control" multiple>
												<option value=""></option>
												@foreach ($types as $type)
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
								</form>
								<!--end::Form-->
							</div>
							<!--end::Content-->

                </div>
                <!--end::Body-->
	
                <!-- NOTE TAB -->
                <div class="tab-pane fade " id="kt_table_widget_5_tab_6">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form method="POST" action="{{ route('noteGroup.save') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body border-top p-9">
                
            <input type="text" name="groupId" value="{{ $group->id }}" hidden>
                <!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> Note </label>
                    <!--end::Label-->

                    <div class="col-lg-8 fv-row">
                    <textarea id="note" class="form-control form-control-lg form-control-solid" name="note" rows="4" cols="100">{{ $notes != null ? $notes->text : ""}}</textarea>

                    </div>
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
        </form>
        <!--end::Form-->
    </div>
                </div>
                <!--end::Tap pane-->

                <!-- FINE NOTE TAB -->
	

                <!-- TAB SETTINGS -->
	
                <div class="tab-pane fade" id="kt_table_widget_5_tab_7">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form method="POST" action="{{ route('settingsGroup.save') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body border-top p-9">
                
            <input type="text" name="groupId" value="{{ $group->id }}" hidden>
                <!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6"> {{__('dictionary.legitimateInterest') }} </label>
                    <!--end::Label-->

                    <div class="col-lg-8 fv-row">
                        @if($settings->legitimate_interest)
					    <input type="checkbox" name="legitimateInterest" checked>
                        @else
                        <input type="checkbox" name="legitimateInterest" >
                        @endif
                    </div>
                </div>
                <!--end::Input group-->
				
				
				<!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6"> {{__('dictionary.privacyPolicy') }} </label>
                    <!--end::Label-->

                    <div class="col-lg-8 fv-row">
                    @if($settings->privacy_policy)
					    <input type="checkbox" name="privacyPolicy" checked>
                        @else
                        <input type="checkbox" name="privacyPolicy" >
                        @endif

                    </div>
                </div>
                <!--end::Input group-->
			
				
				<!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6"> {{__('dictionary.consentToCommunicate') }} </label>
                    <!--end::Label-->

                    <div class="col-lg-8 fv-row">
                    @if($settings->consent_To_Comm)
					    <input type="checkbox" name="consentToCommunicate" checked>
                        @else
                        <input type="checkbox" name="consentToCommunicate" >
                        @endif


                    </div>
                </div>
                <!--end::Input group-->
				
				
				
				<!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6"> {{__('dictionary.consentToProcessData') }} </label>
                    <!--end::Label-->

                    <div class="col-lg-8 fv-row">
                    @if($settings->consent_To_Process)
					    <input type="checkbox" name="consentToProcessData" checked>
                        @else
                        <input type="checkbox" name="consentToProcessData" >
                        @endif

                    </div>
                </div>
                <!--end::Input group-->

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

 </div>
  </div>
   </div>
<!-- FINE TAB SETTINGS -->

	
	
	
                <!-- MEDIA TAB -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_5">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('media/componentGroup', compact('media','group')) }}
	
                </div>
                </div>
                   
 
                <!--end::Tap pane-->
	
	
	

                <!--  TAB EVENT -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_9">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('event/component', compact('events')) }}
	
                </div>
                </div>


                <!-- FINE TAB EVENT -->

                <!--  TAB PROJECTS -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('project/component', compact('projects')) }}
	
                </div>
                </div>
	                <!-- FINE TAB PROJECTS -->


                      <!--  TAB TASK -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_4">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('task/component', compact('tasks')) }}
	
                </div>
                </div>
	                <!-- FINE TAB TASK -->

</div>
</div>
</div>


@section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script src="{{ asset('js/document.js') }}" ></script>
  <script src="{{ asset('js/media.js') }}"></script>


  <script type="text/javascript">
$(document).ready(function() {

var user_id = '<?php echo Auth()->user()->id?>';
var workspace_id = $('#selWS').val();

var stato = '<?php echo $group->status ?>';
var tags = '<?php echo $Mytags ?>';
var types = '<?php echo $Mytypes ?>';

const myArraytags = tags != "" ? tags.split(",") : [];
const myArraytypes = types != "" ? types.split(",") : [];


$('#status').val(stato);

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


        $('#tag').val(myArraytags).trigger('change');
      $('#type').val(myArraytypes).trigger('change');

      $( "#btnRemoveMediaGroup" ).click(function() {
      jQuery.ajax('/media_deleteGroup',
      {
          method: 'POST',
          data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
              "id": $('#mediaIdRemove').val()
  
          },
  
          complete: function (resp) {
              var result = JSON.parse(resp.responseText);

              console.log(JSON.stringify(result));

              if(result.code){
                  $('#box-success').css('display','block');
                  location.reload();
              }
              else{
                  $('#box-error').css('display','block');
              }
             
          }
      });


  });



});
</script>


@endsection

</x-base-layout>






