<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Home page</title>

		
    </head>

	<body>
	</body>
	</html>
	
@extends('layout.base')

@section('head')
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
@endsection

@section('body')
<div id="app">@yield('main-content')</div>

<script src="{{ mix('/js/app.js') }}"></script>
@endsection