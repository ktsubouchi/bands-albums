<div class="form-horizontal">
    <div class="form-group {{ $errors->has('band_id') ? 'has-error' : '' }}">
        {{ Form::label('band_id', 'Band', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::select('band_id', $bandSelectData, $album->band_id, ['class' => 'form-control']) }}
            <span id="band-help">@if($errors->has('band_id')){{ $errors->first('band_id') }}@endif</span>
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'required col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::text('name', $album->name, ['class' => 'form-control', 'autofocus']) }}
            <span id="name-help">@if($errors->has('name')){{ $errors->first('name') }}@endif</span>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('recorded_date', 'Recorded Date', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::date('recorded_date', $album->recorded_date, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('release_date', 'Release Date', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::date('release_date', $album->release_date, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('number_of_tracks', 'Number Of Tracks', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::number('number_of_tracks', $album->number_of_tracks, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('label', 'Record Label', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::text('label', $album->label, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('producer', 'Producer', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::text('producer', $album->producer, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('genre', 'Genre', ['class' => 'col-md-2 control-label']) }}
        <div class="col-md-10">
            {{ Form::text('genre', $album->genre, ['class' => 'form-control']) }}
        </div>
    </div>
    
    

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <button class="btn btn-primary">{{ $submitButtonText }}</button>
        </div>
    </div>
</div>
