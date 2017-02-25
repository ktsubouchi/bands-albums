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
            <span class="page-title">Edit Album</span>
        </div>

        <h4>Band</h4>
        <ul style="list-style:none;">
            <li>{{ $album->band->name }}</li>
        </ul>

        <hr>

        {{ Form::model($album, ['action' => ['AlbumController@update', 'id' => $album->id]]) }}
        @include('album._form', ['submitButtonText' => 'Update', 'bandSelectData' => $bandSelectData])
        {{ Form::close() }}
    </div>
@endsection