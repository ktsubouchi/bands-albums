<?php
/**
 * @var $band \App\Band
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <span class="page-title">Create Band</span>
        </div>

        <hr>

        {{ Form::model($band, ['action' => 'BandController@store']) }}
        @include('band._form')
        {{ Form::close() }}
    </div>
@endsection