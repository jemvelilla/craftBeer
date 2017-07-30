<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	 <form action="/search" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="form-group">
            <label for="search">Enter bar name</label>
<!--             <input type="file" name="upload-file" class="form-control"> -->
            	<input type="text" name="barName"/>
            <br><br>
            <label for="search">Enter your api key</label>
            	<input type="text" name="key"/>
        	<br><br>
        	<input class="btn btn-success" type="submit" value="Upload" name="submit">
        </div>
    </form>
	
</body>
</html>