<x-base-layout>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/workspaces.js') }}" type="text/javascript"></script>

<div class="row justify-content-center">
        <div class="card col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.manageContacts') }} </b></h3>

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

            <thead>
                <tr>
                    <th>{{__('dictionary.firstnameTh') }}</th>
                    <th>{{__('dictionary.lastnameTh') }}</th>
                    <th>{{__('dictionary.statusTh') }}</th>
                    <th>{{__('dictionary.emailTh') }}</th>
                    <th>{{__('dictionary.createdTh') }}</th>
                    <th>{{__('dictionary.actionsTh') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($contacts as $w)
                    <tr>
                        <td>{{ $w->first_name }} </td>
                        <td>{{ $w->last_name }}</td>
                        <td>{{ $w->status}}</td>
                        <td>{{ $w->email}}</td>
                        <td>{{ $w->created_at}}</td>
                        <td>

                        <a  href="{{ route('contact_edit', $w->id)}}" title="MODIFICA" class="btn btn-upd btn-table" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <label  style="word-wrap:break-word">

                            <a data-toggle="modal" href="#confirmationModal" title="ELIMINA" class="btn btn-remove btn-table" id="{{ $w->id }}">
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
                <tfoot>

                </tfoot>
            </table>
        




     <!-- Modal Delete -->
      <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>{{__('dictionary.remove') }} {{__('dictionary.lblContact') }}</h5>
                    <h5 id="wsIdRemove" hidden></h5>
                </div>
                <div class="modal-body">
                    <h4>{{__('dictionary.confirmRemove') }}{{__('dictionary.lblContact') }} ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> {{__('dictionary.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="btnRemove"><i class="fa fa-trash mr-1"></i>{{__('dictionary.remove') }}</button>
                </div>
            </div>
        </div>
      </div>



	  </div>
      </div>



</x-base-layout>






