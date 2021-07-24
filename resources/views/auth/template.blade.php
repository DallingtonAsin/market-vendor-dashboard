<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> 
            @if(isset($companyData))
            {{ $companyData['company_name'] }}
            @else
            {{ env('APP_NAME') }}
            @endif
        </title>
        <link href="{{ asset('css/login/css.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link href="{{ asset('css/login/nunito.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login/app.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="body">
        <div id="app">
            <main>
                @yield('content')
            </main>
        </div>
        @livewireScripts
    </body>
    </html>
