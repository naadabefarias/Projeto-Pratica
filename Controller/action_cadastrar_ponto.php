<?php 
	session_start();
	$id = $_SESSION['id'];
 	require_once('conexao.php');

 
 	if(isset($_POST['nome_ponto']) && isset($_POST['lat']) && isset($_POST['lng']) && isset($_POST['logradouro']) && isset($_POST['bairro']) && isset($_POST['descricao']) && isset($_FILES['imagem'])){
 		
 		$nome = $_POST['nome_ponto'];
 		$lat = $_POST['lat'];
 		$lng = $_POST['lng'];
		$logradouro = $_POST['logradouro'];
		$bairro = $_POST['bairro'];
		$numero = $_POST['numero'];
		$categoria = $_POST['categoria'];
		$descricao = $_POST['descricao'];

		//Cadastrar imagem
		$imagem = $_FILES['imagem']; //arquivo enviado
		if(isset($imagem)){
			mkdir(__DIR__.'/../upload/', 0777, true);//Cria a pasta upload e se já existir não faz nada.
			$extensao  =  strtolower(substr($imagem['name'], -4));//pega as 4 ultimas letras do nome
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../upload/";//onde ele será salvo
			move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio
		}	

 		
 		$sql = "INSERT INTO pontos_turisticos (user_id, nome_ponto, lat, lng, logradouro, bairro, numero_ponto, imagem, categoria, descricao) 
						VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 		$query = $conn->prepare($sql);
		$query->bindParam(1, $id);
 		$query->bindParam(2, $nome);
 		$query->bindParam(3, $lat);
 		$query->bindParam(4, $lng);
		$query->bindParam(5, $logradouro);
		$query->bindParam(6, $bairro);
		$query->bindParam(7, $numero);
		$query->bindParam(8, $novo_nome);
		$query->bindParam(9, $categoria);
		$query->bindParam(10, $descricao);
 		$stmt = $query->execute();
		header('Location: ../index.php');
	} else {
 		// echo "Erro!!";
 	}
	
  ?> 