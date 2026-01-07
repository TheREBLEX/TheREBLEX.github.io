<?php require("register.class.php") ?>
<?php
	if(isset($_POST['submit'])){
		$user = new RegisterUser($_POST['username'], $_POST['password'], $_POST['script'],  $_POST['descripcion'],  $_POST['imagen']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="styles.css">
	<title>Sube tu script</title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<h2>Sube tu script</h2>


		<label>title</label>
		<input type="text" name="username">
		
		<label>descripcion</label>
		<input type="text" name="descripcion">
		
		<label>script(sin loadstring solo el link)</label>
		<input type="text" name="script">

	    <label>Imagen(link de la imagen)</label>
		<input type="text" name="imagen">


		<button type="submit" name="submit">Sube tu script</button>

		<p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
	</form>

</body>
</html>