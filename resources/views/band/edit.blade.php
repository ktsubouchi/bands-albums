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

        <h4>Albums</h4>
        <ul style="list-style:none;">
            @foreach($band->albums as $album)
                <li>{{ $album->name }}</li>
            @endforeach
        </ul>
        
        <hr>

        {{ Form::model($band, ['action' => ['BandController@update', 'id' => $band->id]]) }}
            @include('band._form')
        {{ Form::close() }}
    </div>
@endsection
