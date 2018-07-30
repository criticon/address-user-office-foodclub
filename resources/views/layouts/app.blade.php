<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
    
  <title>address ::: user office ::: foodclub</title>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
	<div class="cbc">
		<div class="main">
			@include('inc.header')
			
			@yield('content')
		</div>
	
        @include('inc.footer')
	</div>
</body>

</html>

