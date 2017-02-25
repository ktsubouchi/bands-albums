@extends('layouts.app')

@section('content')
    <div class="container">
        <span class="page-title">Albums</span>

        <span class="page-options">
            
        </span>

        <hr>

        <label for="band-filter">Filter Bands</label>
        <select id="band-filter" name="Band">
            <option></option>
            @foreach($bandFilterData as $band)
                <option value="{{ $band['name'] }}">{{ $band['name'] }}</option>
            @endforeach
        </select>
        
        <table id="albums-grid" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Band</th>
                    <th class="no-search">Recorded</th>
                    <th>Released</th>
                    <th># of Tracks</th>
                    <th>Label</th>
                    <th>Producer</th>
                    <th>Genre</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('js')
<script>
    var $albumGrid = $("#albums-grid")
        .DataTable({
            processing: false,
            serverSide: false,
            dom: 'tp',
            ajax: '{{ action('AlbumController@ajaxGetAlbums') }}',
            columns: [
                {data:'name'},
                {data:'band_id'},
                {data:'recorded_date'},
                {data:'release_date'},
                {data:'number_of_tracks'},
                {data:'label'},
                {data:'producer'},
                {data:'genre'}
            ]
        });
    
    $("#band-filter").change(function(){
        $albumGrid.search($(this).val()).draw();
    });
    
</script>
@endpush