<?php
session_start();
include "conexao.php";
	
	$estrela = $_POST['estrela'];
	$created = date_create();
	$date = date_format($created, 'Y-m-d');
	$star = ("INSERT INTO avaliacoes (qnt_estrela) VALUES ($estrela)");
	$queryTwo = $conn->prepare($star);
	$queryTwo->bindParam(':estrela', $estrela);
 	$stmt = $queryTwo->execute();

	header('Location: ../avalie.php');

	
