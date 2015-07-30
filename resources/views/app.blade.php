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

</head>
<body>
	
	<header>
		<h1>Verlanglijstjes</h1>
		<a class="awsome" href="{{ url('/') }}"><i class="fa fa-gift"></i></a>
	</header>
	
	<nav>		
		<ul class="head-nav">
			@if (Auth::guest())
				<li class="btn"><a class="btn-round green btn-center" href="{{ url('/auth/login') }}"><i class="fa fa-sign-in"></i></a><span>Inloggen</span></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
					</ul>
				</li>
			@endif
		</ul>
	</nav>
	
	<section>
	@yield('content')
	</section>
	
	<footer>
		<ul class="nav">
			<li><a href="{{ url('/') }}"><i class="fa fa-gift"></i> Home</a></li>
			<li><a href="#"><i class="fa fa-plus"></i> kado toevoegen</a></li>
		</ul>
	</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
