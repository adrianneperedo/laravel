<html>
<head>
    <title>@yield('title')</title>
    <!-- stylesheets -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}"/>
    <link href="/css/roboto.min.css" rel="stylesheet">
    <link href="/css/material.min.css" rel="stylesheet">
    <link href="/css/ripples.min.css" rel="stylesheet">

</head>
<body>
    @include('shared.navbar')

    @yield('content')
    <!-- scripts -->
    <script src="{!! asset('js/jquery-1.11.3.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>
    <script>
        $(document).ready(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();
        });
    </script>
</body>
</html>
