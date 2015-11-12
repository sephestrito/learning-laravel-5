<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
	<div class="container">

		@if (Session::has('flash_message'))
			<div class="alert-success alert">
					@if (Session::has('flash_message_important'))
						<button type="button" class="close" data-dismiss="alert" aria-hidde="true">&times;</button>
					@endif
					{{ Session::get('flash_message') }}
			</div>
		@endif

		@yield('content')
	</div>

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	@yield('footer')

</body>

</html>