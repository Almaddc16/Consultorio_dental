<!doctype html>
<html>
	<head>
		<title>Subir imagen a la base de datos</title>
	</head>
	<body>
	<form action="subir.php" method="POST" enctype="multipart/form-data">
	<label for="imagen">Imagen:</label>
	<input type="file" name="imagen" id="imagen" />
	<input type="text" name="texto" id="texto" />
	<input type="submit" name="subir" value="Subir"/>
	</form>
	</body>
</html>