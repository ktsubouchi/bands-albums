@extends('layouts.app')

@section('content')
    <div class="container">
        <span class="page-title">Bands</span>

        <span class="page-options">
            <a href="#"><i class="fa fa-plus"></i> Add Band</a>
            <a href="{{ action('SiteController@albums') }}"><i class="fa fa-bars"></i> Albums</a>
        </span>

        <hr>

        <table id="bands-grid" class="table">
            <thead>
                <tr>
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
            columns: [
                {data:'name'},
                {data:'start_date'},
                {data:'website'},
                {data:'still_active'}
            ]
        })
</script>
@endpush