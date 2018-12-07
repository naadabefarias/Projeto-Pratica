<?php
session_start();
include "conexao.php";

if($_POST['nome'] != null && $_POST['idade'] != null && $_POST['user'] != null && $_POST['pass'] != null && $_POST['senha2']!=null && $_POST['pass'] == $_POST['senha2']){

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	var_dump($idade);
	$pergunta = $_POST['pergunta'];
	var_dump($pergunta);
	$resposta = $_POST['resposta'];
	var_dump($resposta);
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

		$sql = "INSERT INTO Users(name, idade, user, password) VALUES (:nome, :idade, :user, :pass)";
		$query = $conn->prepare($sql);
		$query->bindParam(':nome', $nome);
		$query->bindParam(':idade', $idade);
		$query->bindParam(':user', $user);
		$query->bindParam(':pass', $pass);
		$stmt = $query->execute();
		$_SESSION['emailCadastro'] = $_POST['email'];
		$_SESSION['nomeCadastro'] = $_POST['nome'];

		$_SESSION['cadastro_sucesso'] = true;

		header('location: email.php');	
	}	

}else {
	$_SESSION['fail_campo']=true;
	header('location:../index.php');
}

?>