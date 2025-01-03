<!DOCTYPE HTML>
<html>
<head>
    <title>Quiz in Computer Science</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>

    <noscript>
        <link rel="stylesheet" href="{{ asset('/css/noscript.css') }}"/>
    </noscript>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="#" class="logo">
                <span class="symbol"><img src="{{ asset('/images/logo.svg') }}" alt=""/></span><span class="title">Quiz</span>
            </a>

        </div>
    </header>

    <!-- Main -->
    <div id="main">
        <div class="inner">
            @yield('header')
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <ul class="copyright">
                <li>&copy; All rights reserved</li>
                <li>Wiem Louhichi</li>
            </ul>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/browser.min.js') }}"></script>
<script src="{{ asset('/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('/js/util.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>

</body>
</html>
