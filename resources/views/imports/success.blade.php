<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	
	<h1>Success !</h1>
	<form method="post" action="/place">
		{{ csrf_field() }}
		<p>
			 <label for="search">Enter your api keys (provide 4 api keys for testing purposes)</label>
            	<input type="text" name="key1" required/>
            	<input type="text" name="key2" required/>
            	<input type="text" name="key3" required/>
            	<input type="text" name="key4" required/>
		</p>
		
		<input type="submit" value="Extract place ID">
	</form>
</body>
</html>