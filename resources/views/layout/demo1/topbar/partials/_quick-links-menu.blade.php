<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
	<!--begin::Heading-->
    <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('{{ asset('media//misc/pattern-1.jpg') }}')">
        <!--begin::Title-->
        <h3 class="text-white fw-bold mb-3">
            Quick Links
        </h3>
        <!--end::Title-->

        <!--begin::Status-->
        <span class="badge bg-success py-2 px-3">25 pending tasks</span>
        <!--end::Status-->
    </div>
	<!--end::Heading-->

    <!--begin:Nav-->
    <div class="row g-0">
        <!--begin:Item-->
        <div class="col-6">
            <a href="{{ theme()->getPageUrl('pages/projects/budget') }}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                {!! theme()->getSvgIcon("icons/duotone/Shopping/Euro.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Accounting</span>
                <span class="fs-7 text-gray-400">eCommerce</span>
            </a>
        </div>
        <!--end:Item-->

        <!--begin:Item-->
        <div class="col-6">
            <a href="{{ theme()->getPageUrl('pages/projects/settings') }}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                {!! theme()->getSvgIcon("icons/duotone/Communication/Mail-attachment.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Administration</span>
                <span class="fs-7 text-gray-400">Console</span>
            </a>
        </div>
        <!--end:Item-->

        <!--begin:Item-->
        <div class="col-6">
            <a href="{{ theme()->getPageUrl('pages/projects/list') }}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                {!! theme()->getSvgIcon("icons/duotone/Shopping/Box2.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Projects</span>
                <span class="fs-7 text-gray-400">Pending Tasks</span>
            </a>
        </div>
        <!--end:Item-->

        <!--begin:Item-->
        <div class="col-6">
            <a href="{{ theme()->getPageUrl('pages/projects/users') }}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                {!! theme()->getSvgIcon("icons/duotone/Communication/Group.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Customers</span>
                <span class="fs-7 text-gray-400">Latest cases</span>
            </a>
        </div>
        <!--end:Item-->
    </div>
    <!--end:Nav-->

    <!--begin::View more-->
    <div class="py-2 text-center border-top">
        <a href="{{ theme()->getPageUrl('pages/profile/activity') }}" class="btn btn-color-gray-600 btn-active-color-primary">
            View All
            {!! theme()->getSvgIcon("icons/duotone/Navigation/Right-2.svg", "svg-icon-5") !!}
        </a>
    </div>
    <!--end::View more-->
</div>
<!--end::Menu-->
