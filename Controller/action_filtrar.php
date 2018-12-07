<?php 	
include('conexao.php');

	
	

if (isset($_POST["query"])){
	$dado = $_POST["query"];

	$output = '';

	// Teste
	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");


	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");
	$consultei = $conn -> query("SELECT id, nome_ponto, imagem FROM pontos_turisticos;");

	$queryOne = $conn->prepare($checking);
	$queryOne->bindValue(':pesquisa', '%'.$dado.'%');
	$return = $queryOne -> execute();
	
	
		$stmt = $queryOne->fetchAll();
		$output = '<ul class="listas_result" style="list-style-type:none;">';
		if ($stmt!=null){
		
		
				for ($i = 0; $i < sizeof($stmt); $i++){
					$id1 = $stmt[$i]['id'];
					$output .= "<a href='view_visualizar_pontos.php?id=$id1'><li class='filtro'>" .$stmt[$i]['nome_ponto']. "</li></a>";
		
				}
			}
		else { 
			$output .= '<li> nada encontrado</li>';
	
	}
	$output .= '</ul>';
	echo $output;
}

?>
