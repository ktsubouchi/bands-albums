<?php
/**
 * @var $album \App\Album
 * @var $bandSelectData
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <span class="page-title">Edit Band</span>
        </div>
        
        <span class="page-sub-title">{{ $album->band->name }}</span>

        <hr>

        {{ Form::model($album, ['action' => ['AlbumController@update', 'id' => $album->id]]) }}
        @include('album._form', ['submitButtonText' => 'Update', 'bandSelectData' => $bandSelectData])
        {{ Form::close() }}
    </div>
@endsection