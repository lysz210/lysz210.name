@extends('layout.base')

@section('head')
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
@endsection

@section('body')
<div id="app">@yield('main-content')</div>

<script src="{{ mix('/js/app.js') }}"></script>
@endsection