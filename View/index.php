	<?php 
require_once('../Controller/conexao.php');

	// $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos;"); 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Seu Ponto turistico</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
	<div class="barra">
		<!-- Barra superior -->
		<nav class="main">
			<div id="divBusca">
				<input  style="text-align:right;" type="text"  name="txtBusca" id="txtBusca" placeholder="☣Pesquisa ai fera☣" />
					<div id="locais" class="locais"></div>	
					<a href="" id="link_pesquisa" onclick="function(consulte);;"><img src="images/search3.png" id="btnBusca" alt="Buscar"/> </a>
			</div>
			</div>
			<!-- Liks da barra superior-->
			<div class="itens">
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
							<a href="../Controller/logout.php" class="btn-login">
								Logout
							</a>
						</li>									
				<?php
					 }else{
				 ?>

						<li id="" class="menu-item4">
							<a href="login.php" class="btn-login">
								Login 
							</a>
						</li>
				<?php } ?>
			</ul>			
			</nav>
			</div>

</head>
<body>
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
</body>
</html>

<script >//Função de pesquisa, Auto complete Input
$(document).ready(function(){
$('#txtBusca').keyup(function() {
var query = $(this).val();
	if(query != ''){
	
$.ajax({
	url:"../Controller/search.php",
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
