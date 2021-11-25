
<?php

use App\Models\UserWorkspace;

$workspaces = UserWorkspace::
        select(
            'workspaces.id',
            'users.name as uname',
            'users.email',
            'workspaces.name',
            'workspace_user.created_at as date'
        )
        ->join('workspaces', 'workspaces.id', '=', 'workspace_user.workspace_id')
        ->join('users', 'users.id', '=', 'workspace_user.user_id')
        ->where('workspace_user.user_id', '=', Auth()->user()->id)
        ->get();
?>

<!--begin::Search-->
<div
    id="kt_header_search"
    class="d-flex align-items-stretch"

    data-kt-search-keypress="true"
    data-kt-search-min-length="2"
    data-kt-search-enter="enter"
    data-kt-search-layout="menu"

    data-kt-menu-trigger="auto"
    data-kt-menu-overflow="false"
    data-kt-menu-permanent="true"
    data-kt-menu-placement="bottom-end"
    data-kt-menu-flip="bottom">



     <!--begin::Search toggle-->
     <div class="d-flex align-items-center">

        <select id="selWS" class="form-control form-control-lg form-control-solid">
                
            @foreach ($workspaces as $workspace)
                <option value="{{ $workspace->id }}">{{ $workspace->name }}</option>
            @endforeach
            
        </select>
        
    </div>
    <!--end::Search toggle-->


    <!--begin::Search toggle-->
    <div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">
        <div class="btn btn-icon btn-active-light-primary">
            {!! theme()->getSvgIcon("icons/duotone/General/Search.svg", "svg-icon-1") !!}
        </div>
    </div>
    <!--end::Search toggle-->



    

    <!--begin::Menu-->
    <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
        <!--begin::Wrapper-->
        <div data-kt-search-element="wrapper">

        
            {{ theme()->getView('layout/search/partials/_form') }}

            {{ theme()->getView('layout/search/partials/_results') }}

            {{ theme()->getView('layout/search/partials/_main') }}

            {{ theme()->getView('layout/search/partials/_empty') }}
        </div>
        <!--end::Wrapper-->

        {{ theme()->getView('layout/search/partials/_advanced-options') }}

        {{ theme()->getView('layout/search/partials/_preferences') }}
    </div>
    <!--end::Menu-->
</div>
<!--end::Search-->
