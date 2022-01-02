<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Tailwind is included -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts below are for demo only -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <script type="text/javascript" src="{{ asset('assets/js/chart.sample.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/main.min.js') }}"></script>
        
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    </head>

    <body class="font-sans antialiased">
        <div  class="bg-gray-100" id="app">

            <!-- Navigation -->
            @include('layouts.admin.navigation')
            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            </div>
    </body>
</html>