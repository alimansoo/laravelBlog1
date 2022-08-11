<!DOCTYPE HTML>
<html>
<head>
    <title>بلاگ شخصی</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="http://127.0.0.1:8000/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/main.css" />

</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    @include('layouts.header')
{{--    @include('layouts.menu')--}}
    @yield('main')
</div>

<!-- Scripts -->
<script src="http://127.0.0.1:8000/assets/js/jquery.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/browser.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/breakpoints.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/util.js"></script>
<script src="http://127.0.0.1:8000/assets/js/main.js"></script>

</body>
</html>
