<?php 

	require_once('conexao.php');

	if(isset($_POST['nome_ponto']) && isset($_POST['logradouro']) && isset($_POST['bairro'])){

		$nome = $_POST['nome_ponto'];
		$logradouro = $_POST['logradouro'];
		$bairro = $_POST['bairro'];
		$numero = $_POST['numero'];


		$sql = "INSERT INTO pontos_turisticos (nome_ponto, logradouro, bairro, numero_ponto) 
						VALUES(:nome, :logradouro, :bairro, :numero)";


		$query = $conn->prepare($sql);

		$query->bindParam(":nome", $nome);
		$query->bindParam(":logradouro", $logradouro);
		$query->bindParam(":bairro", $bairro);
		$query->bindParam(":numero", $numero);

		$stmt = $query->execute();
		header('Location: ../index.php');
		
	} else {

		echo "Erro!!";

	}
	

 ?>