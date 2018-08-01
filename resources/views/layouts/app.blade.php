<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Note Service</title>

        <!-- Material Design -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-indigo.min.css" />
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @include('commons.navbar')
        @yield('cover')
        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>
    </body>
</html>