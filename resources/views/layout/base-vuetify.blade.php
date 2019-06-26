@extends('layout.base')

@section('head')
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel="stylesheet">
@endsection

@section('body')
<div id="app">@yield('main-content')</div>

<script src="{{ mix('/js/app.js') }}"></script>
@endsection