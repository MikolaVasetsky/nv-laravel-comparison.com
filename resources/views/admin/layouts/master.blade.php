<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Navbar Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	</head>

	<body>

		<nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md">
			<div class="container">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleContainer" aria-controls="navbarsExampleContainer" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="{{route('admin')}}">Admin</a>

				<div class="collapse navbar-collapse" id="navbarsExampleContainer">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="{{route('type.index')}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</a>
							<div class="dropdown-menu" aria-labelledby="dropdown02">
								<a class="dropdown-item" href="{{route('type.index')}}">List</a>
								<a class="dropdown-item" href="{{route('type.create')}}">Create</a>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('category.index')}}">Category</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('attribute.index')}}">Attribute</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('options.index')}}">Options</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('product.index')}}">Product</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


		@yield('content')

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/tether.min.js')}}"></script>
		{{-- <script type="text/javascript" src="{{asset('js/script.js')}}"></script> --}}
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	</body>
</html>
