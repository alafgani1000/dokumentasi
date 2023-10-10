<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main-style.css') }}" />
        <script src="{{ asset('js/app.js') }}"></script>
        <style>
            .center {
                width: 30%;
                margin: auto;
                border: 1px solid black;
                padding: 20px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <main class="center">
            <form action="">
                <label>(* File di proteksi, silahkan isi password untuk mengakses file</label>
                <br/>
                <br/>
                <label class="form-label">Password </label>
                <br/>
                <input type="hidden" name="signature" value="{{$signature}}"/>
                <input type="hidden" name="token" value="{{$token}}"/>
                <input type="password" class="form-control" name="password"/>
                <label class="text-danger">{{ isset($message) ? $message : "" }}</label>
                <br/>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </main>
    </body>
</html>
