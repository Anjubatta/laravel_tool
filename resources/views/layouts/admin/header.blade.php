<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="site-url" content="{{ asset('/') }}">

        <title>{{ @$title['title'] }}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css'
        ) }}">
        <link href="{{ asset('css/datetimepicker.css') }}" rel="stylesheet">
        
        <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/style1.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('fonts/font.css') }}" rel="stylesheet">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		 <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.css') }}"/>
    </head>
    <body class="app sidebar-mini rtl">