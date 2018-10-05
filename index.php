<?php 
require_once('Controller/conexao.php');

	// $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos;"); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seu Ponto turistico</title>
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">



	
		<!-- Barra superior -->

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Pontos Turísticos</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Sobre</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="#">Quem Somos Nós</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group" >
          <input type="text"  class="form-control" placeholder="Pesquise um ponto">
        </div>
        <button type="submit" class="btn btn-default">Pesquisa</button>
      </form>
      <ul class="nav navbar-nav navbar-right">

      <?php 
      	if (!isset($_SESSION['user'])){
      ?>
        <li id="" class="menu-item4">
							<button type="button" id='login' class="btn btn-info" data-toggle="modal" data-target="#myModal">Sign In <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
				</li>

			<?php  
				}else{
			?>			

				<ul class="nav navbar-nav">
        	<li><a href="cadastrar_pontos.php">Cadastrar Pontos</a></li>
      	</ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Configurações</a></li>
            <li><a href="#">Adiministrar contas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Controller/logout.php">Logout</a></li>
          </ul>
        </li>
      <?php 
      	} 

      ?>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<!-- MODAL DE LOGIN -->
	<?php  
		if (isset($_GET['error'])){
	?>
		<div class="alert alert-danger" role="alert">Login ou senha inválido!</div>		
	<?php  }

	?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h2>Login</h2>
	        </div>
	        <div class="modal-body">
	        	<form action="Controller/auth.php" method="POST">
	  				<div class="form-group">
	    				<label for="login">Usuário:</label>
	    				<input type="text" class="form-control" id="login" name="login">
	  				</div>
					<div class="form-group">
						<label for="pwd">Senha:</label>
					    <input type="password" class="form-control" id="pwd" name="senha">
					</div>
					<div class="checkbox">
	    				<label><input type="checkbox"> Lembrar de mim</label>
	  				</div>
	  				<button type="submit" class="btn btn-primary btn-block">Entrar</button>
				</form>
	        </div>
	        <div class="modal-footer">
	          <label>Não tem conta?</label>
	          <a href="cadastrar_usuario.php">Cadastre-se!</a>
	        </div>
	    </div>
	      
	</div>
  </div>
	<h1> Pontos Cadastrados </h1>
		<table class="ui celled table" id="tabela">
			<tr>
				<th> Nome do Ponto </th>
				<th> Logradouro </th>
				<th> Bairro </th>
				<th> imagem </th>
			</tr>
			
			<?php 

				while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)){
					echo "<tr>";
						echo "<td>{$linha['nome_ponto']}</td>";
						echo "<td>{$linha['logradouro']}</td>";
						echo "<td>{$linha['bairro']}</td>";?>
						<td><img src= "upload/<?=$linha['imagem'];?>" class="img"></td>
				<?php	echo "</tr>";
				}
			 ?>
		</table>		
		<!-- Footer -->
		<div id="foot"></div>
		<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <strong>IFPE</strong>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>

<script >//Função de pesquisa, Auto complete Input
$(document).ready(function(){
$('#txtBusca').keyup(function() {
var query = $(this).val();
	if(query != ''){
	
$.ajax({
	url:"Controller/search.php",
	method:"POST",
	data:{query:query},
	success:function(data)
	{
$('#locais').fadeIn();
$('#locais').html(data);
	
}
   });
	  }
    });
});
    $(document).on('click', 'li', function(){
    $('#txtBusca').val($(this) .text());
    $('#locais') .fadeOut();
	});
    </script>