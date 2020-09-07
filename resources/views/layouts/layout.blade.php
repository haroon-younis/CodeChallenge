<!doctype html>
<html lang="en">
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="author" content="Haroon Younis" />
		<meta name="description" content="Code Challenge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
    <div class="container">
        @yield('content')
    </div>
    
    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3">Code Challenge by
        <p> Haroon Younis</p>
      </div>
    </footer>

	</body>
</html>
