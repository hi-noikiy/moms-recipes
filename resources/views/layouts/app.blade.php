<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript">
        window.__INITIAL_STATE__ = "{!! addslashes(json_encode($state)) !!}";
    </script>
</head>
<body class="bg-grey-lightest">

    @yield('content')

    <!-- Scripts -->
    @if (env('APP_ENV') === 'local')
        <script src="{{ mix('/js/app.js') }}"></script>
    @else
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    @endif
</body>
</html>
