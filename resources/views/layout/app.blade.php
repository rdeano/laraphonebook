<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>

	 	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">


	    <title>{{ config('app.name', 'LARAPHONEBOOK') }}</title>

		<!-- Styles -->
    	<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	</head>

<body>

	<div id="app">
		@include('inc.navbar')

		<div class="container">
			
		 	@yield('content')
		</div>
	</div>

	<!-- scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>


</body>

</html>

