@extends('layouts.app')

@section('content')
    <div class="container">
        <span class="page-title">Bands</span>

        <span class="page-options">
            <a href="#"><i class="fa fa-plus"></i> Add Band</a>
        </span>

        <hr>

        <table id="bands-grid" class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>Website</th>
                    <th>Still Active</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('js')
<script>
    $("#bands-grid")
        .DataTable({
            processing: false,
            serverSide: false,
            ajax: '{{ action('BandController@ajaxGetBands') }}',
            order: [[2, 'asc']],
            columns: [
                {data:'edit', width:'20px', searchable:false, sortable:false},
                {data:'delete', width:'20px', searchable:false, sortable:false},
                {data:'name'},
                {data:'start_date'},
                {data:'website'},
                {data:'still_active'}
            ],
            fnInitComplete: function(){
                //$("#bands-grid").dataTable().fnAdjustColumnSizing();
            }
        })
</script>
@endpush