<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset(elixir('css/all.css')) }}">
</head>
<body>
    @include('partials.nav')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <script src="{{ asset(elixir('js/all.js')) }}"></script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>