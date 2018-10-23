<?php
require_once('view_header.php');
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit();
}

?>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Mali');
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

#titulo_cadastro {
	font-family: 'Mali', cursive;
}

</style>
<div class="ui container">
	<h1 id="titulo_cadastro"> Cadastro de Pontos Turísticos </h1>
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

<?php 
	
	require_once('view_footer.html');
 ?>