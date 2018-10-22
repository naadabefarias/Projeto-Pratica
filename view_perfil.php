<?php 
	session_start(); 
	if (!isset($_SESSION['user'])){
		header('Location: index.php');
		exit();
	}
	$user = $_SESSION['user'];
	require_once 'Controller/conexao.php';
	$stmt = $conn->prepare("SELECT name,user FROM Users where user=?");
	$stmt->bindParam(1,$user);
	$stmt->execute();
	$dados = $stmt->fetch();
?>
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
        	<li><a href="view_cadastrar_pontos.php">Cadastrar Pontos</a></li>
	        <li class="dropdown active">
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

	<?php if (isset($_GET['pwderr'])):?>
		<script type="text/javascript">
			alert("Senha Inválida!");
		</script>
	<?php endif ?>

	<div id="corpo">
		<h1>Perfil <span class="glyphicon glyphicon-user"></span></h1>
		<div id="dados">
			<?php if(isset($_GET['att'])):?>
				<h3>Atualize seus dados</h3><br>
	
				<form class="form-horizontal" action="Controller/action_att_user.php" method="POST">
					<div class="form-group">
				      <label class="control-label col-sm-2" for="nome">Nome:</label>
				      <div class="col-sm-10">          
				        <input type="text" class="form-control" id="nome"  name="nome" value="<?=$dados['name']?>">
				      </div>
				    </div>


				    <div class="form-group">
				      <label class="control-label col-sm-2" for="user">Usuario:</label>
				      <div class="col-sm-10">          
				        <input type="text" class="form-control" id="user"  name="user" value="<?=$dados['user']?>">
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <label class="control-label col-sm-2" for="pwd">Senha:</label>
				      <div class="col-sm-10">          
				        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
				      </div>
				    </div>
				    
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" class="btn btn-default">Atualizar</button>
				      </div>
				    </div>
				</form>
					

			<?php else:?>
		<h3>Seus Dados </h3>
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Nome</th>
			        <th>Usuário</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><?=$dados['name']?></td>
			        <td><?=$dados['user']?></td>
			      </tr>
			      
			    </tbody>
			</table>
			</div>
			<a href="view_perfil.php?att"><button class="btn-primary btn">Alterar Dados</button></a>
			<?php endif ?>
	</div>
			<!-- Footer -->
	<footer class="container-fluid text-center">
  		<div class="footer-copyright text-center py-3">© 2018 Copyright:<strong>IFPE</strong></div>
	</footer>
</body>
</html>