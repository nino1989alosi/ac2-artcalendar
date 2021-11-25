<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.createEvent') }}</span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">
                    {{__('dictionary.detailTab') }}</a>
                </li>



                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.operatorsTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.economicsTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_4">
                    {{__('dictionary.partecipantsTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.resourceTab') }}</a>
                </li>



               
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_4">
                    {{__('dictionary.documentsTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.taskTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" disabled data-bs-toggle="tab" href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.noteTab') }}</a>
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
								<form method="POST" action="{{ route('new.event') }}" enctype="multipart/form-data">
										@csrf
									<div class="card-body border-top p-9">


										<!--begin::Input group FIELD -->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.title') }} </label>
											<!--end::Label-->

											<div class="col-lg-8 fv-row">
												<input type="text" name="title" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.title') }}" value="{{ old('title')  }}">
											</div>
										</div>
										<!--end::Input group-->







                                         <!--begin::Input group-->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.description') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="descrizione" rows="4" cols="100" value="{{ old('description')  }}"></textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->




                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.date') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-4 fv-row">
												<input type="date" name="date" required class="form-control form-control-lg form-control-solid" >
                                               
											</div>

                                            <div class="col-lg-4 fv-row">	
                                            <label>{{__('dictionary.allDay') }}</label>										
                                                <input type="checkbox" id="allday" checked>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



                                         <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6"></label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-4 fv-row">
                                            <select name="startH" id="startH" class="form-control" disabled>

                                                <option value="0:00">0:00</option>
                                                <option value="0:30">0:00</option>
                                                <option value="1:00">1:00</option>
                                                <option value="1:30">1:30</option>
                                                <option value="2:00">2:00</option>
                                                <option value="2:30">2:30</option>
                                                <option value="3:00">3:00</option>
                                                <option value="3:30">3:30</option>
                                                <option value="4:00">4:00</option>
                                                <option value="4:30">4:30</option>
                                                <option value="5:00">5:00</option>
                                                <option value="5:30">5:30</option>
                                                <option value="6:00">6:00</option>
                                                <option value="6:30">6:30</option>
                                                <option value="7:00">7:00</option>
                                                <option value="7:30">7:30</option>
                                                <option value="8:00">8:00</option>
                                                <option value="8:30">8:00</option>
                                                <option value="9:00">9:00</option>
                                                <option value="9:30">9:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>                                               

                                            </select>                       
                                               
											</div>

                                            <div class="col-lg-4 fv-row">	
                                            <select name="endH" id="endH" class="form-control" disabled>

                                                        <option value="0:00">0:00</option>
                                                        <option value="0:30">0:00</option>
                                                        <option value="1:00">1:00</option>
                                                        <option value="1:30">1:30</option>
                                                        <option value="2:00">2:00</option>
                                                        <option value="2:30">2:30</option>
                                                        <option value="3:00">3:00</option>
                                                        <option value="3:30">3:30</option>
                                                        <option value="4:00">4:00</option>
                                                        <option value="4:30">4:30</option>
                                                        <option value="5:00">5:00</option>
                                                        <option value="5:30">5:30</option>
                                                        <option value="6:00">6:00</option>
                                                        <option value="6:30">6:30</option>
                                                        <option value="7:00">7:00</option>
                                                        <option value="7:30">7:30</option>
                                                        <option value="8:00">8:00</option>
                                                        <option value="8:30">8:00</option>
                                                        <option value="9:00">9:00</option>
                                                        <option value="9:30">9:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>                                               

                                                 </select>     
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
                                            <select name="stato" id="stato" class="form-control" >
                                                <option value="1">{{__('dictionary.active') }}</option>
                                                <option value="2">{{__('dictionary.option') }}</option>
                                                <option value="3">{{__('dictionary.confirmed') }}</option>
                                                <option value="4">{{__('dictionary.cancelled') }}</option>
                                                <option value="5">{{__('dictionary.promo') }}</option>
                                                <option value="6">{{__('dictionary.notAvailable') }}</option>
                                                <option value="7">{{__('dictionary.awaitConfim') }}</option>
                                                <option value="8">{{__('dictionary.deleted') }}</option>

                                            </select>                       
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->






                                         <!--begin::Input group-->
                                         <div class="row mb-6">
                                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.eventType') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                            <select name="eventType" id="eventType" class="form-control" >
                                                <option value=""></option>
                                                <option value="1">{{__('dictionary.phisical') }}</option>
                                                <option value="2">{{__('dictionary.virtual') }}</option>
                                            </select>                       
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->




                                        <!--begin::Input group-->
                                        <div class="row mb-6" id="etFisico" >
                                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.locationPhisical') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                            <select name="eventType1" id="eventType1" class="form-control" >
                                            
                                                <option value="1">{{__('dictionary.phisical') }}</option>
                                                <option value="2">{{__('dictionary.virtual') }}</option>
                                            </select>                       
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->




                                        <!--begin::Input group-->
                                        <div class="row mb-6" id="etVirtual">
                                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.locationVirtual') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-4 fv-row">
                                                <select name="platform" id="platform" class="form-control" >
                                                    <option value="">{{__('dictionary.selectPlatform') }}</option>
                                                    <option value="1">{{__('dictionary.phonecall') }}</option>
                                                    <option value="2">Zoom</option>
                                                    <option value="3">Google Meet</option>
                                                    <option value="4">Microsoft Team</option>
                                                </select>                       
                                            </div>
                                            <!--end::Col-->

                                            <div class="col-lg-4 fv-row">
												<input type="text" name="locationVirtual"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.locationVirtual') }}" value="{{ old('locationVirtual')  }}">
											</div>


                                        </div>
                                        <!--end::Input group-->










                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.projectToAllegare') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                            <select name="project" id="project" class="form-control" >
                                                <option value=""></option>
                                                @foreach ($projects as $p)
                                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                @endforeach 
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

$(document).ready(function() {
var user_id = '<?php echo Auth()->user()->id?>';

$('#etVirtual').css('display','none');
$('#etFisico').css('display','none');

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







        $('#allday').change(function() {
            if($(this).is(":checked")) {
                $('#startH').prop( "disabled", true ); 
                $('#endH').prop( "disabled", true );    
            }
            else{
                $('#startH').prop( "disabled", false ); 
                $('#endH').prop( "disabled", false );      
            }  
        });


        $("#eventType").change(function(){
            if($(this).val() == 1){
                $('#etFisico').css('display','flex');
                $('#etVirtual').css('display','none');
            }
            if($(this).val() == 2){
                $('#etFisico').css('display','none');
                $('#etVirtual').css('display','flex');
            }
        });



		});



</script>


@endsection

</x-base-layout>






