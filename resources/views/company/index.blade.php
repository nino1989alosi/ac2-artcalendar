<x-base-layout>
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>Company List</b></h3>

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


                    <th>{{__('dictionary.nameTh') }}</th>
                    <th>{{__('dictionary.legalnameTh') }}</th>
                    <th>{{__('dictionary.phoneTh') }}</th>
                    <th>{{__('dictionary.emailTh') }}</th>
                    <th>{{__('dictionary.createdTh') }}</th>
                    <th class="text-center">{{__('dictionary.actionsTh') }}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($companys as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->legal_name }}</td>
                        <td>{{ $c->phone }}</td>

                        <td>{{ $c->email }}</td>
                        <td>{{ $c->created_at }}</td>

                        <td>

                        <a href="{{ route('company_edit', $c->id)}}" title="MODIFICA" class="btn btn-upd btn-table">
                            <i class="fas fa-pencil-alt"></i>
                            {{ __('Modifica') }}
                        </a>

                        <label  style="word-wrap:break-word">

                            <a href="javascript:void(0)" title="ELIMINA" class="btn btn-upd btn-remove btn-table" id="{{ $c->id }}">
                                <i class="fas fa-trash-alt fa-delete"></i> ELIMINA
                            </a>
                        </label>

                        <form name="form-pag-destroy" id="form-pag-destroy_{{ $c->id }}"  action="{{ route('company.delete', $c->id) }}" method="post" style="display:none;">
                            @csrf
                            @method("DELETE")
                        </form>


                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">{{ __('Non ci sono Record') }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>


</x-base-layout>






