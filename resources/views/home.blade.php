<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link href = "https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel = "stylesheet" type = "text/css">
</head>
<body>
	<div id="app">
		<v-app>
			<app-home></app-home>
		</v-app>
		
	</div>
 <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>