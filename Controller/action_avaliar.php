<?php
session_start();
include "conexao.php";
//Para que o Horário fique igual ao de Brasilia
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

$idPonto 	= $_GET['id'];
$estrela 	= $_POST['estrela'];
$created = date_create();
$date = date_format($created, 'd-m-y');

		$star = ("INSERT INTO avaliacoes (qnt_estrela) VALUES (?)");
		$queryTwo = $conn->prepare($star);
		$queryTwo->bindParam(1, $estrela);
	 	$stmt = $queryTwo->execute();
		 header('Location: ../view_visualizar_pontos.php?id='.$idPonto);

	
