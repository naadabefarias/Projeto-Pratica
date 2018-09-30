<?php 
require_once('Controller/conexao.php');

	// $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos;"); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seu Ponto turistico</title>
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<div class="barra">
		<!-- Barra superior -->
		<nav class="main">
			<div id="divBusca">
				<input  style="text-align:right;" type="text" id="txtBusca" placeholder="" />
				<img src="images/search3.png" id="btnBusca" alt="Buscar"/>
			</div>
			<!-- Liks da barra superior-->
			<ul id="menu-main" class="menu">
				<li id="nav" class="menu-item">
					<a href="#" class="menu-item0">Home</a>
				</li>
				<li id="" class="menu-item">
					<a href="#" class="menu-item1">Contatos </a>
				</li>
				<li id="" class="menu-item">
					<a href="#" class="menu-item2">Prefeituras </a>
				</li>
				<li id=" " class="menu-item">
					<a href="#" class="menu-item3">Cidades</a>
				</li>
				<li id="nav" class="menu-item">
					<a href="cadastrar_pontos.php" class="menu-item4">Cadastrar Pontos</a>
				<?php 
					if (isset($_SESSION['user'])){
				?>
						<li id="" class="menu-item4">
							<a href="Controller/logout.php" class="btn-login">
								Logout
							</a>
						</li>									
				<?php
					 }else{
				 ?>

						<li id="" class="menu-item4">
							<a href="#" data-toggle="modal" data-target="#login-modal" class="btn-login">
								Login 
							</a>
						</li>
				<?php } ?>
			</ul>			
		</nav>
	</div>
	<!-- MODAL DE LOGIN -->
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form>
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
</head>
<body>
		<h1> Pontos Cadastrados </h1>
		<table class="ui celled table" id="tabela">
			<tr>
				<th> Nome do Ponto </th>
				<th> Logradouro </th>
				<th> Bairro </th>
			</tr>
			
			<?php 

				while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)){
					echo "<tr>";
						echo "<td>{$linha['nome_ponto']}</td>";
						echo "<td>{$linha['logradouro']}</td>";
						echo "<td>{$linha['bairro']}</td>";
					echo "</tr>";
				}

			 ?>

		</table>		
</body>
</html>


