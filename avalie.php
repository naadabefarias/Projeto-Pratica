 <?php
 		$id = $_GET['id'];
		$qnt_star = ("SELECT qnt_estrela FROM avaliacoes WHERE id = $id  ");
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
				
				<label for="estrela_1"><i class="fa"></i></label>
				<input type="radio" id="estrela_1" name="estrela" value="1">
				
				<label for="estrela_2"><i class="fa"></i></label>
				<input type="radio" id="estrela_2" name="estrela" value="2">
				
				<label for="estrela_3"><i class="fa"></i></label>
				<input type="radio" id="estrela_3" name="estrela" value="3">
				
				<label for="estrela_4"><i class="fa"></i></label>
				<input type="radio" id="estrela_4" name="estrela" value="4">
				
				<label for="estrela_5"><i class="fa"></i></label>
				<input type="radio" id="estrela_5" name="estrela" value="5"><br><br>
				

				<input type="submit" value="Avaliar" class="ui primary button">
				
			</div>
		</form>
	</body>
</html>