<?php 
	require_once 'conexao.php';

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$consulta=$conn->prepare("SELECT user AND password FROM Users WHERE user=? AND password=? ");
	$consulta->bindParam(1,$login);
	$consulta->bindParam(2,$senha);
	$consulta->execute();
	
	if ($consulta->rowCount() >= 1){
		session_start();
		$_SESSION['user'] = $login;
		header('Location: ../index.php');

	} else {
		header('Location: ../login.php?error');
	}


?>