<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
	<div class="container">
		<header
			class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
			<ul class="nav nav-pills">
				<li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">Posts</a></li>
				<li class="nav-item"><a href="{{ route('main.index') }}" class="nav-link">Main</a></li>
				<li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About</a></li>
				<li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contacts</a></li>
			</ul>
		</header>
		<div class="row">
			<div class="col">
				@yield('content')
			</div>
		</div>
	</div>
</body>

</html>