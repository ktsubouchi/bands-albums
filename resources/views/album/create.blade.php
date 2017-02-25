<?php
/**
 * @var $album \App\Album
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <span class="page-title">Create Album</span>
        </div>

        <hr>

        {{ Form::model($album, ['action' => 'AlbumController@store']) }}
        @include('album._form', ['submitButtonText' => 'Create'])
        {{ Form::close() }}
    </div>
@endsection