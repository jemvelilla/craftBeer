<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	
	<form action="/import" method="POST" enctype="multipart/form-data">
		
		{{ csrf_field() }}
		<p>
			<input type="file" name="excelFile"/>
		</p>
		<p>
			 <label for="search">Enter your api keys (provide 4 api keys for testing purposes)</label>
            	<input type="text" name="key1"/>
            	<input type="text" name="key2"/>
            	<input type="text" name="key3"/>
            	<input type="text" name="key4"/>
		</p>
		<p>
			<button type="submit" name="upload">
				Upload
			</button>
		</p>
		
	</form>
	
</body>
</html>