<?php 
require_once('Controller/conexao.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$dado_pesquisa = $_GET['search'];

	$consulta = $conn -> prepare("SELECT * FROM ponto_turisticos WHERE nome_ponto LIKE  =?");
	$consulta -> bindValue(1,$dado_pesquisa);
	$consulta -> execute();
		$resultado = $consulta ->fetchall();
		
		for($i=0; $i<sizeof($resultado); $i++){
				echo $resultado[$i]['id'];
				echo $resultado[$i]['nome_ponto'];
					
		}

			?>
</body>
</html>
