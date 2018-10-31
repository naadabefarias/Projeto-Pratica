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
  
/*.pesq{
	margin-top: 7px;
	margin-left: 7px;
*/}
form {
	margin-top: 5em;
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
    <label for="sel1">Select list (select one):</label>
      <select class="form-control" name="categoria">
        <option value="praia">praia</option>
        <option value="rio">rio</option>
        <option value="praca">praca</option>
        <option value="museu">museu</option>
        <option value="igreja">igreja</option>
        <option value="monumento">monumento</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
		<input type="submit" value="Cadastrar" class="ui primary button">
	</form>
</div>

<?php 
	
	require_once('view_footer.html');
 ?>