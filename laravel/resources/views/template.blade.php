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
<div id="wrapper">
    <header id="header">
        <div class="inner">
            <a href="/" class="logo">
                <span class="symbol"><img src="{{ asset('/images/logo.svg') }}" alt=""/></span><span class="title">Quiz</span>
            </a>
        </div>
    </header>
    <div id="main">
        <div class="inner">
            @yield('header')
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/browser.min.js') }}"></script>
<script src="{{ asset('/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('/js/util.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>

</body>
</html>
