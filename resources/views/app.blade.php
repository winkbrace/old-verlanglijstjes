<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body id="container">
	
	<header>
		<h1>Verlanglijstjes</h1>
		<a class="awsome" href="{{ url('/') }}"><i class="fa fa-gift"></i></a>
        
        <ul class="head-nav">
            @if (Auth::guest())
                <li class="btn btn-login">
                    <span>Inloggen</span>
                    <a class="btn-main green" href="{{ url('/auth/login') }}"><i class="fa fa-user"></i></a>
                </li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} 
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>

        
	</header>
    
	<section class="content">
        @yield('content')        
	</section>
	
	<footer>
	    <!--Bas if homepage do not show-->
        <div class="btn-home"> <span>Home</span>           
            <a class="btn btn-main green" href="{{ url('/') }}"><i class="fa fa-home"></i></a>
             
        </div>
        
        <!--Bas laat deze knop staan eerst wil ik testen wat we hier doen -->
        <div class="btn-add"><span>Cadeaux</span> 
            <a class="btn btn-main pink"><i class="fa fa-plus"></i></a>
            
        </div>
	</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
