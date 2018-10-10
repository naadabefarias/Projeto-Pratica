<?php 	
include('conexao.php');

if (isset($_POST["query"])){
	$dado = $_POST["query"];

	$output = '';


<<<<<<< HEAD
	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");
=======
<<<<<<< HEAD
	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

	$queryOne = $conn->prepare($checking);
	$queryOne->bindValue(':pesquisa', '%'.$dado.'%');
	$return = $queryOne -> execute();
	
	
		$stmt = $queryOne->fetchAll();
		$output = '<ul class="listas_result">';
		if ($stmt!=null){
		
		
		for ($i = 0; $i < sizeof($stmt); $i++){
			$output .= '<li>' .$stmt[$i]['nome_ponto']. '</li>';
		
		}
	}
		else { 
			$output .= '<li> nada encontrado</li>';
	
	}
	$output .= '</ul>';
	echo $output;
=======
$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");
>>>>>>> 9291fb40a3eda9cff424d59e217e91596e9513f6

	$queryOne = $conn->prepare($checking);
	$queryOne->bindValue(':pesquisa', '%'.$dado.'%');
	$return = $queryOne -> execute();
	
	
		$stmt = $queryOne->fetchAll();
		$output = '<ul class="listas_result">';
		if ($stmt!=null){
		
		
		for ($i = 0; $i < sizeof($stmt); $i++){
			$output .= '<li>' .$stmt[$i]['nome_ponto']. '</li>';
		
		}
	}
<<<<<<< HEAD
		else { 
			$output .= '<li> nada encontrado</li>';
	
	}
	$output .= '</ul>';
	echo $output;

=======
	else { 

	
	}
$output .= '</ul>';
echo $output;
>>>>>>> f326df1f652ee40d77145a326ef838611901bfd4
>>>>>>> 9291fb40a3eda9cff424d59e217e91596e9513f6
}

?>
