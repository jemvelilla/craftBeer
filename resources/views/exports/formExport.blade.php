<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	
	<form action="/export" method="POST">
		{{ csrf_field() }}
		<button name="export">
				Download as CSV
		</button>
	
	</form>
	
	<form action="/export_xlsx" method="POST">
	
		{{ csrf_field() }}
		<button name="export">
				Download as XLSX
		</button>
	
	</form>
	
</body>
</html>