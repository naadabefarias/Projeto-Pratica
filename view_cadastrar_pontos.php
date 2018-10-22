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
	input.pesq{
  width: 40em;
}    
.pesq{
  margin-top: 7px;
  margin-left: 7px;
}
	form {
		margin-top: 50px;
	}
	.container{
		margin-top: 6em;
		height: 800px;	
	}
	footer {
      background-color: #000000;
      padding: 25px;
      color: white;
    }
</style>
<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-map-marker"></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><input type="text" name="form-controlpesq" id="form-controlpesq" class="form-control pesq" placeholder="Pesquise um ponto" autocomplete="off">
       	</li>
       	<li><button type="submit" class="btn btn-default pesq">Pesquisa</button></li>
      </ul>
    
    <?php if (!isset($_SESSION['user'])): ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myCadastro" id="cadastro"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal"  id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
  	<?php else: ?>
 		<ul class="nav navbar-nav navbar-right">
        	<li class="active"><a href="#">Cadastrar Pontos</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conta <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="view_perfil.php">Perfil</a></li>
	            <li><a href="#">Configurações</a></li>
	            <li><a href="#">Adiministrar contas</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="Controller/action_logout.php">Logout</a></li>
	          </ul>
	        </li>
      	</ul>
    <?php endif ?>       
    </div>
  </div>
</nav>
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

		<!-- Footer -->
	<footer class="container-fluid text-center">
  		<div class="footer-copyright text-center py-3">© 2018 Copyright:<strong>IFPE</strong></div>
	</footer>
</body>
</html>
