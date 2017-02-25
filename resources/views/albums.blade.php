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
                    <th></th>
                    <th></th>
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
            order: [[2, 'asc']],
            columns: [
                {data:'edit', searchable:false, sortable:false, width:'20px'},
                {data:'delete', searchable:false, sortable:false, width:'20px'},
                {data:'name'},
                {data:'band_id'},
                {data:'recorded_date'},
                {data:'release_date'},
                {data:'number_of_tracks'},
                {data:'label'},
                {data:'producer'},
                {data:'genre'}
            ]
        })
        .on('click', '.delete-album', function(e){
            e.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: '{{ url('album') }}/' + $(this).data('pk') + '/delete',
                data: {_token: '{{ csrf_token() }}'},
                success: function(){
                    $albumGrid.ajax.reload();
                }
            })
        });
    
    $("#band-filter").change(function(){
        $albumGrid.search($(this).val()).draw();
    });
    
</script>
@endpush