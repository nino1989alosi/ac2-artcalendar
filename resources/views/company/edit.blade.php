<x-base-layout>

 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.editCompany') }}</span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">
                    {{__('dictionary.detailTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_2">
                    {{__('dictionary.emailTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_3">
                    {{__('dictionary.addressTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_5">
                    {{__('dictionary.mediaTab') }}</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_10">
                    {{__('dictionary.documentTab') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab"  href="#kt_table_widget_5_tab_11">
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




         <!--  TAB EVENT -->
         <div class="tab-pane fade" id="kt_table_widget_5_tab_9">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('event/component', compact('events')) }}
	
                </div>
                </div>


                <!-- FINE TAB EVENT -->

                <!--  TAB PROJECTS -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_11">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('company/projectcomponent', compact('projects')) }}
	
                </div>
                </div>
	                <!-- FINE TAB PROJECTS -->


                      <!--  TAB TASK -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_4">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('task/componentInTab', compact('tasks')) }}
	
                </div>
                </div>
	                <!-- FINE TAB TASK -->




                    
                <!--begin::Tap pane kt_table_widget_5_tab_1-->
                <div class="tab-pane fade active show" id="kt_table_widget_5_tab_1">
                    <!--begin::Table container-->
                    <!--begin::Content-->
							<div id="kt_account_profile_details" class="collapse show">
								<!--begin::Form-->
								<form method="POST" action="{{ route('new.company') }}" enctype="multipart/form-data">
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
												<input type="text" name="name" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.name') }}" value="{{ old('name') ?? $company->name  }}">
											</div>
										</div>
										<!--end::Input group-->



										 <!--begin::Input group FIELD -->
										 <div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label  fw-bold fs-6"> {{__('dictionary.legalname') }} </label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="legalname"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.legalname') }}" value="{{ old('legalname') ?? $company->legalname }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.mainphone') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="tel" name="phone"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.phone') }}" value="{{ old('phone')  ?? $company->phone }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



                                        	<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.mainfax') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="tel" name="fax"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.fax') }}" value="{{ old('fax')  ?? $company->fax }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->


                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.mainemail') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="email"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.email') }}" value="{{ old('email') ?? $company->email }}">
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->




										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.website') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="text" name="website"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.website') }}" value="{{ old('website')  ?? $company->website }}">

											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.fiscalcode') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="text" name="fiscalcode"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.fiscalcode') }}" value="{{ old('fiscalcode')  ?? $company->fiscalcode }}">

											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



                                         <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.vat_number') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="text" name="vat_number"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.vat_number') }}" value="{{ old('vat_number') ?? $company->vat_number }}">

											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->




                                        <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.registration') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="text" name="registration"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.registration') }}" value="{{ old('registration') ?? $company->registration  }}">

											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->




                                         <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.annual_revenue') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="text" name="annual_revenue"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.annual_revenue') }}" value="{{ old('annual_revenue')  ?? $company->annual_revenue }}">

											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->



                                         <!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.employees') }}</label>
											<!--end::Label-->

											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
											<input type="number" name="employees"  class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.employees') }}" value="{{ old('employees')  ?? $company->employees  }}">

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
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="description" rows="4" cols="100" value="{{ old('description')  }}">{{ $company->description}}</textarea>
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




                 <!--begin::Input group-->
                 <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('dictionary.group') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                    <select name="groups[]" id="group" class="form-control" multiple>
                        <option value=""></option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
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
	
	
	
	
	
	
	
		<!-- TAB EMAIL -->

<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('mail.saveCompany') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body border-top p-9">
                            
                        <input type="text" name="companyId" value="{{ $company->id }}" hidden>
                            <!--begin::Input group FIELD -->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> Email </label>
                                <!--end::Label-->

                                <div class="col-lg-8 fv-row">
                                    <input type="email" id="img" name="emailc" required class="form-control required form-control-lg form-control-solid">
                                </div>
                            </div>
                            <!--end::Input group-->



                            <!--begin::Input group FIELD -->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.emailType') }} </label>
                                <!--end::Label-->

                                <div class="col-lg-8 fv-row">
                                <select name="emailcType" id="gender" class="form-control form-control-lg form-control-solid">
													<option value=""></option>
													<option value="1">{{__('dictionary.personal') }}</option>
													<option value="2">{{__('dictionary.business') }}</option>
													<option value="3">{{__('dictionary.private') }}</option>
													</select>                    
												
                                </div>
                            </div>
                            <!--end::Input group-->

                            <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="border-0">
                                <th>{{__('dictionary.emailTh') }}</th>
                                <th>{{__('dictionary.emailTypeTh') }}</th>
                                <th>{{__('dictionary.actionsTh') }}</th>
                                    <th></th>
                              </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                            @forelse ($contact_email as $w)
                    <tr>
                        <td>{{ $w->email }} </td>
                        <td>
                             @if($w->email_type == 1)
                             Personal
                             @endif
                             @if($w->email_type == 2)
                             Business
                             @endif
                             @if($w->email_type == 3)
                             Private
                             @endif
                        </td>
                        <td>

                        <label  style="word-wrap:break-word">

                            <a href="#" title="ELIMINA" class="btn btn-remove btn-table btndeleteemail" id="{{ $w->id }}">
                                <i class="fas fa-trash-alt fa-delete"></i> 
                            </a>
                        </label>

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



                         <!-- Modal Delete -->
                        <div class="modal fade" id="confirmationModalEmail" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>{{__('dictionary.remove') }} {{__('dictionary.lblMedia') }}</h5>
                                        <h5 id="emailIdRemove" hidden></h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblMedia') }} ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                                        <button type="button" class="btn btn-danger" id="btnRemoveEmail"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
          
    </div>
	



        <!-- TAB ADDRESS -->
        <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
					 <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Cerca..." id="kt_datatable_search_query"/>
                                        <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                     </span>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2 my-md-0">
                                    <a href="#" title="{{__('dictionary.add') }}" id="openAddAddress" class="btn btn-primary font-weight-bolder btn-go">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>{{__('dictionary.add') }}</a>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
					 




    <!-- inizio modal upd -->


    <div class="modal fade" id="modalUpdAddress" role="dialog">
                    <div class="modal-dialog" style="max-width: 50%;">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title">{{__('dictionary.addAddress') }} </h5></strong>
                                
                            </div>
							<form method="POST" action="{{ route('address.save') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-body">

								
									
								<input type="text" name="companyId" value="{{ $company->id }}" hidden>
									<!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.street') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="streetUpd" id="streetUpd" required class="form-control required form-control-lg form-control-solid"  placeholder="{{__('dictionary.street') }}">
										</div>
									</div>
									<!--end::Input group-->



									<!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.addressType') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
										<select name="addressTypeUpd" id="addressTypeUpd" class="form-control form-control-lg form-control-solid">
															<option value=""></option>
															<option value="1">{{__('dictionary.personal') }}</option>
															<option value="2">{{__('dictionary.office') }}</option>
															<option value="3">{{__('dictionary.private') }}</option>
                                                            <option value="4">{{__('dictionary.vacation') }}</option>
															</select>                    
											</div>
									</div>	
                                    
                                    

                                    <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.city') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="cityUpd" id="cityUpd" required class="form-control required form-control-lg form-control-solid" placeholder="{{__('dictionary.city') }}">
										</div>
									</div>
									<!--end::Input group-->



                                    <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.pcode') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="pcodeUpd"  id="pcodeUpd" required class="form-control required form-control-lg form-control-solid"  placeholder="{{__('dictionary.pcode') }}">
										</div>
									</div>
									<!--end::Input group-->



                                     <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.state') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">

                                        <select id="stateUpd" name="stateUpd" required class="form-control required form-control-lg form-control-solid">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
										</div>
									</div>
									<!--end::Input group-->



                                      <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.country') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="countryUpd" id="countryUpd" required class="form-control required form-control-lg form-control-solid"  placeholder="{{__('dictionary.country') }}">
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
											<textarea id="descriptionUpd" class="form-control form-control-lg form-control-solid" name="descriptionUpd" rows="4" cols="100"></textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->





                                
                            </div>
                            <!--end::Input group-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white btn-active-light-primary me-2" id="closeAddAddress">{{__('dictionary.cancel') }}</button>
                                        <button type="submit" class="btn btn-primary" >{{__('dictionary.save') }}</button>
                                    </div>
									
								 </form>

                            </div>



                        </div>

                    </div>
					 
	<!-- inizio modal Add -->				 
				<div class="modal fade" id="modalAddAddress" role="dialog">
                    <div class="modal-dialog" style="max-width: 50%;">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title">{{__('dictionary.addAddress') }} </h5></strong>
                                
                            </div>
							<form method="POST" action="{{ route('address.saveInCompany') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-body">

								
									
								<input type="text" name="companyId" value="{{ $company->id }}" hidden>
									<!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.street') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="street" required class="form-control required form-control-lg form-control-solid"  placeholder="{{__('dictionary.street') }}">
										</div>
									</div>
									<!--end::Input group-->



									<!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.addressType') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
										<select name="addressType" id="gender" class="form-control form-control-lg form-control-solid">
															<option value=""></option>
															<option value="1">{{__('dictionary.personal') }}</option>
															<option value="2">{{__('dictionary.office') }}</option>
															<option value="3">{{__('dictionary.private') }}</option>
                                                            <option value="4">{{__('dictionary.vacation') }}</option>
															</select>                    
											</div>
									</div>	
                                    
                                    

                                    <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.city') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="city" required class="form-control required form-control-lg form-control-solid" placeholder="{{__('dictionary.city') }}">
										</div>
									</div>
									<!--end::Input group-->



                                    <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.pcode') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="pcode" required class="form-control required form-control-lg form-control-solid"  placeholder="{{__('dictionary.pcode') }}">
										</div>
									</div>
									<!--end::Input group-->



                                     <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.state') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">

                                        <select id="nazione" name="state" required class="form-control required form-control-lg form-control-solid">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
										</div>
									</div>
									<!--end::Input group-->



                                      <!--begin::Input group FIELD -->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.country') }} </label>
										<!--end::Label-->

										<div class="col-lg-8 fv-row">
											<input type="text" name="country" required class="form-control required form-control-lg form-control-solid"  placeholder="{{__('dictionary.country') }}">
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
											<textarea id="description" class="form-control form-control-lg form-control-solid" name="description" rows="4" cols="100" value="{{ old('description')  }}"></textarea>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->





                                
                            </div>
                            <!--end::Input group-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white btn-active-light-primary me-2" id="closeAddAddress">{{__('dictionary.cancel') }}</button>
                                        <button type="submit" class="btn btn-primary" >{{__('dictionary.save') }}</button>
                                    </div>
									
								 </form>

                            </div>



                        </div>

                    </div>
            
			
			
			
			<br>


                            <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="border-0">
                                <th>{{__('dictionary.typeTh') }}</th>
                                <th>{{__('dictionary.cityTh') }}</th>
                                <th>{{__('dictionary.countryTh') }}</th>
                                <th>{{__('dictionary.streetTh') }}</th>
                                    <th>{{__('dictionary.actionsTh') }}</th>
                              </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                            @forelse ($address as $w)
                    <tr>
                        <td>
                            @if($w->type == 1)
                            Personal
                            @endif
                            @if($w->type == 2)
                            Office
                            @endif
                            @if($w->type == 3)
                            Private
                            @endif
                            @if($w->type == 4)
                            Vacation
                            @endif
                         </td>
                        <td>{{ $w->city }} </td>
                        <td>{{ $w->country }} </td>
                        <td>{{ $w->street }} </td>

                        <td>

                        <label  style="word-wrap:break-word">

                            <a href="#" title="ELIMINA" class="btn btn-remove btn-table btndelAddress" id="{{ $w->id }}">
                                <i class="fas fa-trash-alt fa-delete"></i> 
                            </a>
                        </label>

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



                         <!-- Modal Delete -->
                        <div class="modal fade" id="confirmationModalAddress" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>{{__('dictionary.remove') }} {{__('dictionary.lblMedia') }}</h5>
                                        <h5 id="addressIdRemove" hidden></h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblMedia') }} ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                                        <button type="button" class="btn btn-danger" id="btnRemoveAddress"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <!--end::Card body-->

                </div>
                    
                <!--end::Tap pane-->
          
    
	
    
 </div>
    <!-- FINE TAB ADDRESS -->
	
	


                    <!-- NOTE TAB -->
                    <div class="tab-pane fade " id="kt_table_widget_5_tab_6">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form method="POST" action="{{ route('note.saveInCompany') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body border-top p-9">
                
            <input type="text" name="companyId" value="{{ $company->id }}" hidden>
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
        <form method="POST" action="{{ route('settings.saveInCompany') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body border-top p-9">
                
            <input type="text" name="companyId" value="{{ $company->id }}" hidden>
                <!--begin::Input group FIELD -->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6"> {{__('dictionary.legitimateInterest') }} </label>
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
                    <label class="col-lg-4 col-form-label fw-bold fs-6"> {{__('dictionary.privacyPolicy') }} </label>
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
                    <label class="col-lg-4 col-form-label fw-bold fs-6"> {{__('dictionary.consentToCommunicate') }} </label>
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
                    <label class="col-lg-4 col-form-label fw-bold fs-6"> {{__('dictionary.consentToProcessData') }} </label>
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
				
				                        </div>
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
</form>
                    <!--end::Form-->
                </div>
                    </div>
                <!--end::Tap pane-->

<!-- FINE TAB SETTINGS -->


<!--  TAB DOCS -->
<div class="tab-pane fade" id="kt_table_widget_5_tab_10">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('document/componentCompany', compact('documents', 'MyDocuments','element')) }}
	
                </div>
                </div>
	                <!-- FINE TAB DOCS -->


                <!-- MEDIA TAB -->
                <div class="tab-pane fade" id="kt_table_widget_5_tab_5">
                    <!--begin::Table container-->
                     <div id="kt_account_profile_details" class="collapse show">
                     {{ theme()->getView('media/componentCompany', compact('media','company')) }}
	
                </div>
                </div>
                   
 
                <!--end::Tap pane-->
	
	
	

</div>
</div>
</div>


@section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script src="{{ asset('js/document.js') }}" ></script>
  <script type="text/javascript">


var user_id = '<?php echo Auth()->user()->id?>';
var workspace_id = $('#selWS').val();


$( "#openAddAddress" ).click(function() {
    $('#modalAddAddress').modal('toggle');
});

$( "#closeAddAddress" ).click(function() {
    $('#modalAddAddress').modal('toggle');
});



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


      $('#group').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true,
		tags: true,
      });



	  $('#group').on('select2:select', function (e) {
	var term = e.params.data.text;
	jQuery.ajax('/api/groups/create',
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






