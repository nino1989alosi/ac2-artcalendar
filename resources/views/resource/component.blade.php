
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.manageResources_Title') }}</b></h3>

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


                            </div>
                        </div>
                    </div>



                </div>
            </div>




            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4  tab-gen">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">

                        <th class="min-w-120px">{{__('dictionary.nameTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.descriptionTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.locationTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.valueTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.currencyTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.typecostoTh') }}</th>
                        <th class="min-w-120px">{{__('dictionary.actionsTh') }}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($resourcesConnected as $c)
                    <tr>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->decrizione }}</td>
                        <td>{{ $c->location }}</td>
                        <td>{{ $c->costo_value }}</td>
                        <td>{{ $c->costo_currency }}</td>
                        <td>{{ $c->costo_type }}</td>
                        

                        <td>

                        <a href="#" title="MODIFICA" class="btn btn-upd btn-table">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Modifica') }}
                        </a>

                       
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">{{__('dictionary.noRecord') }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>








