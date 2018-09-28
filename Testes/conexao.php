<?php

$hostname=  "localhost";
$user="root";
$password="";
$database="Cadastro";
$conexao=mysql_connect($hostname,$user,$password,$database);

if (!conexao) {
	print"Falha na conexao com o banco de dados";
}

//




  ?>
