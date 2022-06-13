<!--
asset from
<a href='https://www.freepik.com/vectors/office-files'>Office files vector created by storyset - www.freepik.com</a>
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="{{ asset('js/app.js') }}"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .logo {
                margin-bottom: 0 !important;
            }
        </style>
    </head>
    <body class="antialiased">
        @yield("content")

        @yield('script')
    </body>
</html>
