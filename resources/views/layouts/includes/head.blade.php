<!DOCTYPE html>
<html lang="en" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Font -->
{{--    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @yield('css')

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/Cairo-SemiBold.ttf') }}" />--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/wizard.css') }}" />
    @if(App::getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rtl.css') }}" />
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ltr.css') }}" />
    @endif


</head>

<body>
