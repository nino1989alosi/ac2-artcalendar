@extends('base.base')

@section('content')
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{__('dictionary.acceptInviteTitle') }} {{ $invite->workspace }}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    {{ $invite->id }}
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form method="POST" action="{{ route('accept.invite', $invite->id ) }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body border-top p-9">



                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> {{__('dictionary.fullname') }} </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="fullname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required placeholder="{{__('dictionary.fullname') }}" value="{{ old('fullname') }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->





<!--begin::Input group-->
<div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('dictionary.email') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="email" name="email"  readonly class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.email') }}" value="{{ $invite->invite_to  }}">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->






                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.nickname') }}</label>
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
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('dictionary.Pwd') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="password" name="password" required class="form-control form-control-lg form-control-solid" placeholder="{{__('dictionary.Pwd') }}" value="{{ old('password')  }}">
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
                    {{__('dictionary.acceptBtn') }}
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


@endsection