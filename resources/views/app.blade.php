<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="with=device-width, initial-scale=1">
	<title>Welcome to CleBea Inc Ecommerce</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	@include('inc.nav')
	<div class="container">
		@include('inc.Message')
	</div>
	@yield('intro')
  	@yield('content')
  	@yield('footer_js')
</body>
</html>