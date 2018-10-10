<?php 	

$connect = mysqli_connect("localhost", "root", "jhonny3545", "banco");
if (isset($_POST["query"])){
	$output = '';
	$query = "SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE '%".
	$_POST["query"] ."%'";
	
	$result = mysqli_query($connect,$query);
	
	$output = '<ul class="listas_result">';
	if (mysqli_num_rows($result) > 0)
	{
$a =0;
while ($row = mysqli_fetch_array($result)){
	$a++;
	$output .= '<li>' .$row["nome_ponto"]. '</li>';
 }
}
else {
		$output .= '<li> Nada encontrado</li>';
}
$output .= '</ul>';
echo $output;
}
?>
