<?php

session_start();
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Cadastrar Pontos Turísticos </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="images/icon.png">
</head>
<style type="text/css">
	body {

		margin-top: 25px;
	}
	img.logo{
	  margin-top: -15px;
	  height: 4em;
	  width: 10em;
	}
	nav{
 		height: 5em;
	}
	form {
		margin-top: 50px;
	}
</style>
<body>
	<?php include 'cabecalho.php'; ?>
	<div class="ui container">
		<h1> Cadastro de Pontos Turísticos </h1>
		<form method="post" action="Controller/action_cadastrar_ponto.php" class="ui form" enctype="multipart/form-data">
			<label><h3>Nome do Ponto Turístico </h3></label>
			<input type="text" name="nome_ponto" placeholder="Nome do Ponto Turístico" required=""><br><br>
			<label> <h3>Logradouro </h3></label>
			<input type="text" name="logradouro" placeholder="Logradouro" required=""><br><br>
			<label> <h3>Bairro </h3></label>
			<input type="text" name="bairro" placeholder="Bairro" required=""><br><br>
			<label> <h3>Número </h3></label>
			<input type="text" name="numero" placeholder="Número" ><br><br>
			<label> <h3>Imagem </h3></label>
			<input type="file" name="imagem" placeholder="Imagem" ><br><br>
			<input type="submit" value="Cadastrar" class="ui primary button">
		</form>
	</div>
</body>
</html>
