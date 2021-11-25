
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.manageUsers_Title') }}</b></h3>

            <div>
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="{{__('dictionary.search') }}" id="kt_datatable_search_query"/>
                                        <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                     </span>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2 my-md-0">
                                    <a  title="AGGIUNGI" id="openAddPopupUser" href="#" class="btn btn-primary font-weight-bolder btn-go">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>New</a>
                                   
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>


<label> {{__('dictionary.users') }}({{ $count }})</label>

									<div class="card-body pt-2">
										<div class="row g-6 g-xl-9">

                                        @foreach ($users as $u)
											<div class="col-md-6 col-xxl-4">
												<div class="card">
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														
														<div class="symbol symbol-65px symbol-circle mb-5">

                                                        @if($u->img == null)
                                                        <img src="{{asset('storage/avatarsProfile/oJLJqlAHWekHwGD8sPFqT5Mei7BriSITpbCSCxSw.png')}}" alt="Image"/>
                                                      
                                                        @else
                                                        <img src="{{asset('storage/app/avatarsProfile/oJLJqlAHWekHwGD8sPFqT5Mei7BriSITpbCSCxSw.png')}}" alt="Image"/>
                                                        @endif

                                               
															<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
														</div>
														
														
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{$u->name}}</a>
														
														
														<div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
														
														
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<!--<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>-->
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">{{$u->tasks}}</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<!--<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>-->
															<!--end::Stats-->
														</div>
														
													</div>
													
												</div>
												
											</div>
											
											@endforeach
										</div>
   
									</div>
        </div>




        <!-- NEW -->
        <div class="modal fade" id="modalAddPopupUser" role="dialog" aria-hidden="true"> >
        <div class="modal-dialog modal-xl" role="document" style="max-width:60%">

            <div class="modal-content" style="background-color: #F2F4F4">
                <div class="modal-header bg-dark" style="display: initial;">
                        <span style="float:left;color:white"  id="span-title">{{ __('dictionary.inviteUser') }}</span>

                </div>
            <div class="modal-body">
                <div class="row">
               


                    <div class="col-md-12">
                        <div class="row">                           
                                
                        <input type="text" name="project" id="project_id" value="{{ $element->id }}" hidden>
                        <div class="row">
                                <div class="col-md-6 my-2 my-md-0">
                                    <div class="input-icon"><input type="text" class="form-control" placeholder="Cerca..." id="kt_datatable_search_query"/>
                                        <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                     </span>
                                    </div>
                                </div>


                            </div>

                            

                            <div class="row col-mb-12">
                                <div class="col-lg-12 fv-row">
                                <br>
                                <br>
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4  tab-gen">
                                    <tbody>
                                    @forelse ($allUsers as $c)
                                        <tr>
                                            <td class="text-center"><input type="checkbox" id="{{ $c->id }}" class="cbUsers"></td>
                                            <td>{{ $c->name }}<br>{{ $c->email }}</td>                      
                                        </tr>
                                    @empty
                                        <tr>
                                        
                                            <td colspan="100%">{{ __('dictionary.noRecord') }}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>


                                </div>
                            </div>



                    </div>
                </div>
            </div>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeAddPopupUser" >Cancella</button>
              <button type="submit" class="btn btn-primary" id="btn-save">
                <span>{{ __('dictionary.addSelectedUsers') }}</span>
              </button>
            </div>
			
          </div>
        </div>
      </div>

     





    </div>









