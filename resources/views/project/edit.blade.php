<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.editProject') }}</span>
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
											<label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8">
												<!--begin::Image input-->
												<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(https://preview.keenthemes.com/metronic8/laravel/demo4/media/avatars/blank.png)">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper w-125px h-125px"></div>
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
												<input type="text" name="name" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.name') }}" value="{{ $project->name  }}">
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
											<input type="text" name="website" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.website') }}" value="{{ $project->website }}">

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
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="description" rows="4" cols="100" value="{{ old('description')  }}">{{$project->description}}</textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->





										 <!--begin::Input group-->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.status') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<select name="status" id="status" required class="form-control form-control-lg form-control-solid">
													<option value=""></option>
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
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Tag</label>
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
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.types') }}</label>
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
								<div></div></form>
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
        <form method="POST" action="{{ route('noteProject.save') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body border-top p-9">
                
            <input type="text" name="projectId" value="{{ $project->id }}" hidden>
                <!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> Note </label>
                    <!--end::Label-->

                    <div class="col-lg-8 fv-row">
                    <textarea id="note" class="form-control form-control-lg form-control-solid" name="note" rows="4" cols="100">{{  $project->note }}</textarea>

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


                <!--  TAB USERS -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_7">
                    <div id="kt_account_profile_details" class="collapse show">
                         {{ theme()->getView('user/component', compact('users','count','allUsers','element')) }}
                     </div>
                </div>
	                <!-- FINE TAB USERS -->


                  <!--  TAB DOCS -->
        <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('document/component', compact('documents', 'MyDocuments','element','entity')) }}
	
                </div>
                </div>
	                <!-- FINE TAB DOCS -->


                    

                    
                  <!--  TAB TASK -->
        <div class="tab-pane fade" id="kt_table_widget_5_tab_4">
                     {{ theme()->getView('task/componentInTab', compact('tasks')) }}              
                </div>
	                <!-- FINE TAB TASK -->



                     <!--  TAB MEDIA -->
        <div class="tab-pane fade" id="kt_table_widget_5_tab_5">
                     {{ theme()->getView('media/componentProject', compact('media','element')) }}              
                </div>
	                <!-- FINE TAB MEDIA -->




                    
	
	                

</div>
</div>
</div>


@section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script src="{{ asset('js/users.js') }}" ></script>
  <script src="{{ asset('js/document.js') }}" ></script>
  <script src="{{ asset('js/media.js') }}"></script>
  <script type="text/javascript">

var stato = '<?php echo $project->status ?>';
var tags = '<?php echo $Mytags ?>';
var types = '<?php echo $Mytypes ?>';

const myArraytags = tags != "" ? tags.split(",") : [];
const myArraytypes = types != "" ? types.split(",") : [];

$('#status').val(stato);


      $('#type').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
      });




      $('#tag').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
      });

      $('#tag').val(myArraytags).trigger('change');
      $('#type').val(myArraytypes).trigger('change');




      $( "#btnRemoveMediaProject" ).click(function() {
      jQuery.ajax('/media_deleteProject',
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


</script>


@endsection

</x-base-layout>






