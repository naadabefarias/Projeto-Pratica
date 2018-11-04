<?php
	session_start();
	include "conexao.php";

	if($_POST['nome'] != null && $_POST['user'] != null && $_POST['pass'] != null && $_POST['senha2']!=null && $_POST['pass'] == $_POST['senha2']){

		$nome = $_POST['nome'];
		$user = $_POST['user'];
		$pass = sha1($_POST['pass']);

		$checking=("SELECT * FROM Users WHERE user = ?");

		$queryOne = $conn->prepare($checking);
		$queryOne->bindParam(1,$user);
		$queryOne -> execute();

		$stmt = $queryOne->fetch();
			
		if ($stmt[0] != null){
			
				$_SESSION['cadastro_falhou']=true;
				header('location:../index.php');

		} else {
			
			$sql = "INSERT INTO Users(name, user, password) VALUES (:nome, :user, :pass)";
			$query = $conn->prepare($sql);
			$query->bindParam(':nome', $nome);
			$query->bindParam(':user', $user);
			$query->bindParam(':pass', $pass);
			$stmt = $query->execute();
				
					$_SESSION['cadastro_sucesso'] = true;

					header('location:../index.php');	
		}	
		
	}else {
		$_SESSION['fail_campo']=true;
			header('location:../index.php');
	}

?>