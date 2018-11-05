<?php
session_start();
include "conexao.php";

	$estrela = $_POST['estrela'];


	$star = "INSERT INTO avaliacos (qnt_estrela, created) VALUES ($estrela, NOW())";
	$queryTwo = $conn->prepare($star);
	$queryTwo->bindParam(':estrela', $estrela);

	$stmt = $queryTwo->execute();
	header('Location: ../avalie.php');

	
