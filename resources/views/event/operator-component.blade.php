
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/operators.js') }}" type="text/javascript"></script>


                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('operator.save') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body border-top p-9">
                            
                        <input type="text" name="eventId" value="{{ $element->id }}" hidden>


                             <!--begin::Input group-->
                             <div class="row mb-6">
                                                            <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.connectUsers') }}</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                <select name="users[]" id="usersConnected" class="form-control" multiple="multiple">
                                    <option value=""></option>
                                    @foreach ($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach 
                                </select>                       
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->






                                         <!--begin::Input group-->
                                         <div class="row mb-6">
                                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.connectGroups') }}</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                            <select name="groups[]" id="groupsConnected" class="form-control" multiple="multiple">
                                                <option value=""></option>
                                                @foreach ($groups as $g)
                                                    <option value="{{ $g->id }}">{{ $g->name }}</option>
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



<script type="text/javascript">
$(document).ready(function() {

var usersConnected = '<?php echo $usersConnected ?>';
var groupsConnected = '<?php echo $groupsConnected ?>';

const myArrayusersConnected = usersConnected != "" ? usersConnected.split(",") : [];
const myArraygroupsConnected = groupsConnected != "" ? groupsConnected.split(",") : [];

console.log('myArrayusersConnected: ' + myArrayusersConnected);
console.log('myArraygroupsConnected: ' + myArraygroupsConnected);

$('#usersConnected').select2({
        width: '100%',
        placeholder: "Select an Option",
        tags: true,
        allowClear: true,
     
});
                



$('#groupsConnected').select2({
        width: '100%',
        placeholder: "Select an Option",
        tags: true,
        allowClear: true
});



$('#usersConnected').val(myArrayusersConnected).trigger('change');
$('#groupsConnected').val(myArraygroupsConnected).trigger('change');



});

</script>


