<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="estilos/perfil-style.css">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-cale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="images/icon.png">
</head>
<body>
	<?php include 'cabecalho.php'; ?>

	<div id="corpo">
		<h1>Perfil</h1>
		<h3>Alterar Dados</h3>
		<form>
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1">Nome: </span>
			  <input type="text" class="form-control" aria-describedby="basic-addon1">
			</div><br>

			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon2">Email: </span>
			  <input type="text" class="form-control"  aria-describedby="basic-addon2">
			</div><br>
			
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon2">Senha atual: </span>
			  <input type="text" class="form-control"  aria-describedby="basic-addon2">
			</div><br>
			
		</form>
	</div>
</body>
</html>