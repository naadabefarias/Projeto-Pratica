 <?php
		$qnt_star = ("SELECT qnt_estrela FROM avaliacoes  ");
		$consulta = $conn->prepare($qnt_star);

	 	$stmt = $consulta->execute();
		if ($consulta->rowCount() >= 1) {
			$fetch 		= $consulta->fetch();
 			echo "Obrigado pela sua avaliação de ".$fetch['qnt_estrela']." estrelas";
		
		}



 ?>

 <!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sistema de avaliação</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/estilos/estilo.css">

	
	</head>
	<body>
		<form method="POST" action="/Controller/action_avaliar.php?id=<?=$linha['id']?>" enctype="multipart/form-data">
			<div class="estrelas">
				<input type="radio" id="vazio" name="estrela" value="" checked>
				
				<label for="estrela_um"><i class="fa"></i></label>
				<input type="radio" id="estrela_um" name="estrela" value="1">
				
				<label for="estrela_dois"><i class="fa"></i></label>
				<input type="radio" id="estrela_dois" name="estrela" value="2">
				
				<label for="estrela_tres"><i class="fa"></i></label>
				<input type="radio" id="estrela_tres" name="estrela" value="3">
				
				<label for="estrela_quatro"><i class="fa"></i></label>
				<input type="radio" id="estrela_quatro" name="estrela" value="4">
				
				<label for="estrela_cinco"><i class="fa"></i></label>
				<input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
				

				<input type="submit" value="Avaliar" class="ui primary button">
				
			</div>
		</form>
	</body>
</html>