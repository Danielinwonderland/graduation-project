<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<header >
    @include('includes.header')
</header>
<div class="container">



    <div id="main" class="row">

            @yield('content')

    </div>


</div>
<footer class="footer row">
    @include('includes.footer')
</footer>
</body>
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery-3.5.1.min.js') }}"></script>
</html>
