<?php
	include_once "conexao.php";
?>
<html lang="pt-BR">
<head>
	<meta charset=UTF-8>
	<title>Artigo Single</title>
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="Controller/jquery.js"></script>
	<script type="text/javascript" src="Controller/action_avaliations.js"></script>
</head>

	<body>
<?php
	$id = (int)$_GET['id'];
	$pegaArtigo = $pdo->prepare("SELECT * FROM `artigos` WHERE id = ?");
	$pegaArtigo->execute(array($id));
	while($artigo = $pegaArtigo->fetchObject()){
		$calculo = ($artigo->pontos == 0) ? 0 : round(($artigo->pontos/$artigo->votos), 1);
?>
<span class="ratingAverage" data-average="<?php echo $calculo;?>"></span>
<span class="article" data-id="<?php echo $id;?>"></span>

<div class="barra">
	<span class="bg"></span>
	<span class="stars">
<?php for($i=1; $i<=5; $i++):?>


<span class="star" data-vote="<?php echo $i;?>">
	<span class="starAbsolute"></span>
</span>
<?php 
	endfor;
	echo '</span></div><p class="votos"><span>'.$artigo->votos.'</span> votos</p>';
}
?>
</body>
</html>