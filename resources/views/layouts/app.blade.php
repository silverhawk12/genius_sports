<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
         @stack('additional_headers')
         
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/redmond/jquery-ui.min.css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
        @stack('jquery_brackets')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <script src="{{ asset('js/custom.js') }}"></script>
       
    </head>
    <body>
        <div class="container">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="/">Genious Sports</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="/teams">Teams</a></li>
                    <li><a href="/tournaments">Tournaments</a></li>
<!--                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>-->
                  </ul>
                </div><!--/.nav-collapse -->
              </div><!--/.container-fluid -->
            </nav>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="container-fluid">
                @yield('content')
            </div>

          </div>
        
    </body>
</html>
