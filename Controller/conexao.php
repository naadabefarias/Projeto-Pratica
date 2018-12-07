<?php
	session_start();
	
	// $username = "id7135713_aluno";

	// $password = "ifpe2018";
	// $conn  =  new PDO('mysql:host=localhost;porta=3306;dbname=id7135713_ifpe', $username , $password);
	
	$username = "root";

	$password = "ifpe";
	$conn = new PDO('mysql:host=localhost;porta=3306;dbname=ponto',$username,$password);

	
?>
