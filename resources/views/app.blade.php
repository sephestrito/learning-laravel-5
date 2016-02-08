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

		

		<div class="row">
		  <div class="col-md-4">
		  	<ul>
				<li>Maintenance</li>
				<li>
					<ul>
						<li><a href="/customers/create">Register Customer</a></li>
						{{-- <li><a href="/customers/membership">Membership</a></li>
						<li><a href="/customers/gymaccess">Gym Access Payment</a></li> --}}
						<li>Membership</li>
						<li>Gym Access Payment</li>
						<li><a href="/customers/listing">Customers List</a></li>
					</ul>
				</li>
				<li>Administration</li>
				<li>
					<ul>
						<li>Generate Reports</li>
						<li>Users</li>
						<li><a href="/rates">Rates</a></li>
					</ul>
				</li>
				<li>Logins</li>
				<li>
					<ul>
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
						<li><a href="/auth/logout">Logout</a></li>
					</ul>
				</li>
			</ul>
		  </div>
		  <div class="col-md-8">
			@yield('content')	  	
		  </div>
		</div>

		
	</div>

	<script src="/js/libs/jquery.js"></script>
	<script src="/js/libs/select2.min.js"></script>
	<script src="/js/libs/bootstrap.min.js"></script>
	<script src="/js/app.js"></script>

	@yield('footer')
	<script>
		$( document ).ready(function() {
		    $('.container').show();
		});
	</script>
</body>

</html>