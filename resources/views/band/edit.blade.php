<?php
/**
 * @var $band \App\Band
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <span class="page-title">Edit Band</span>
        </div>
        
        <span class="page-sub-title">{{ $band->name }}</span>

        <span class="page-options">
            
        </span>

        <hr>

        {{ Form::model($band, ['action' => ['BandController@update', 'id' => $band->id]]) }}
            @include('band._form')
        {{ Form::close() }}
    </div>
@endsection
