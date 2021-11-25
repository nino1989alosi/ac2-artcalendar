<x-base-layout>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/workspaces.js') }}" type="text/javascript"></script>

  
<!--begin::Tables Widget 5-->
<div class="card card-xxl-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{__('dictionary.manageWorkspaces') }}</span>

            <span class="text-muted mt-1 fw-bold fs-7">{{__('dictionary.subscriptionsWs') }}</span>
        </h3>
        
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="tab-content">


                <!--begin::Tap pane kt_table_widget_5_tab_1-->
                <div class="tab-pane fade active show" >
                    <!--begin::Table container-->
                    {{ theme()->getView('workspace/invites', array('ws' => $ws)) }}

                </div>
                <!--end::Body-->
	
	
	

	
	
</div>
<!--end::Tables Widget 5-->

</div>
</div>


</x-base-layout>






