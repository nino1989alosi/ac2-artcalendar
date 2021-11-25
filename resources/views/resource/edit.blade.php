<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.editResource') }}</span>
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
								<form method="POST" action="{{ route('update.resource') }}" enctype="multipart/form-data">
										@csrf


										<!--begin::Input group FIELD -->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.name') }} </label>
											<!--end::Label-->
                                            <input type="text" name="id" hidden class="form-control form-control-lg form-control-solid" value="{{ $resource->id  }}">
											<div class="col-lg-8 fv-row">
												<input type="text" name="name" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.name') }}" value="{{ $resource->nome  }}">
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
												<input type="text" name="location" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.location') }}" value="{{ $resource->location }}">
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
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="description" rows="4" cols="100" value="{{ old('description')  }}">{{ $resource->decrizione }}</textarea>
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
												<input type="number" name="disponibilita" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.availability') }}" value="{{ $resource->disponibilita  }}">
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
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.types') }}</label>
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
                                            <input type="text" name="costo_value" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.value') }}" value="{{ $resource->costo_value  }}" >
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
                                            <select name="costo_currency"  class="form-control" id="costo_currency">
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
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.typecosto') }}</label>
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
        </form>
        <!--end::Form-->
    </div>
                
                <!--end::Tap pane-->

               





                  <!--  TAB DOCS -->
        <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('document/componentResource', compact('documents', 'MyDocuments','element','resource')) }}
	
                </div>
                </div>
	                <!-- FINE TAB DOCS -->


                    





                     <!--  TAB MEDIA -->
        <div class="tab-pane fade" id="kt_table_widget_5_tab_5">
                     {{ theme()->getView('media/componentResource', compact('media','element')) }}              
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

var currency = '<?php echo $resource->costo_currency ?>';

$('#costo_currency').val(currency);

var tags = '<?php echo $Mytags ?>';
var types = '<?php echo $Mytypes ?>';

const myArraytags = tags != "" ? tags.split(",") : [];
const myArraytypes = types != "" ? types.split(",") : [];



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


</script>


@endsection

</x-base-layout>






