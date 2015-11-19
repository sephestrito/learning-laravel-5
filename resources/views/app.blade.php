<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="/css/libs/bootstrap.min.css">
	<link rel="stylesheet" href="/css/libs/select2.min.css">
	<link rel="stylesheet" href="/css/app.css">


</head>

<body>
	@include('partials.nav')
	
	<div class="container">

		@include('flash::message')

		@yield('content')
	</div>

	<script src="/js/libs/jquery.js"></script>
	<script src="/js/libs/select2.min.js"></script>
	<script src="/js/libs/bootstrap.min.js"></script>
	<script src="/js/app.js"></script>

	@yield('footer')

</body>

</html>