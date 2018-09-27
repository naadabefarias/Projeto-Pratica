<?php
	include "conexao.php";

	if(isset($_POST['nome']) && isset($_POST['user']) && isset($_POST['pass'])){


		$nome = $_POST['nome'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$checking = "SELECT * FROM Users WHERE user = '".$user."'";
		$queryOne = $conn->prepare($checking);
	 	$stmt = $queryOne->execute();
			var_dump($stmt);
		if ($stmt->rowCount() > 1) {
			"<script> 
				alert('Este usuário já exite');
			</script>"; 
			exit();
		}

		else {
			
			$sql = "INSERT INTO Users(name, user, password)
				//VALUES(:nome, :user, :pass)";
			$query = $conn->prepare($sql);
			$query->bindParam(':nome', $nome);
			$query->bindParam(':user', $user);
			$query->bindParam(':pass', $pass);
			$stmt = $query->execute();

			header('Location: login.php');
		}
		 
		
	}

?>