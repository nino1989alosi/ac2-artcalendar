
<div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.error')
            <h3><b>{{__('dictionary.manageTasks_Title') }}</b></h3>

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
    <tr>
        <th></th>
        <th>Titolo </th>
        <th>Descrizione</th>
        <th>Scadenza </th>
        <th>Owner</th>
        <th>Stato</th>
</tr>
<tbody>
@forelse ($tasks as $row)
    <tr>
        <td><span class="bullet bullet-vertical h-40px" style="background-color:{{ $row->color}}"></span></td>
        <td>{{ $row->titolo }} </td>
        <td>{{ $row->descrizione }}</td>
        <td>Scadenza in {{ $row->scadenza }}</td>
        <td>{{ $row->owner }}</td>


        <td><label class="btnstatus" data-id="{{ $row->id }}" style="cursor:pointer;background-color:{{ $row->color}}; color:white;font-weight:bold;padding:5px;border-radius:5px;">{{ $row->stato }}</label></td>

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





