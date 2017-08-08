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
			<button type="submit" name="upload">
				Upload
			</button>
		</p>
		
	</form>
	
</body>
</html>