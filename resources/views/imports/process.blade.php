<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	
	<h1>Success !</h1>
	<form method="post" action="/process">
		{{ csrf_field() }}
		<input type="submit" value="Extract results">
	</form>
</body>
</html>