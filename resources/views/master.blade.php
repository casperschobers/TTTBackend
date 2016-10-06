<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery.fancybox.css')}}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/jquery.fancybox.js')}}"></script>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox();
            $('.grid').imagesLoaded(function () {
                $('.grid').masonry({
                    // options
                    itemSelector: '.grid-item',
                });
            });
        });
    </script>
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{URL::to('img/icon.png')}}"/>TouchTheTree</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/game')}}">Game</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    @yield('content')
</div> <!-- /container -->
</body>
</html>



