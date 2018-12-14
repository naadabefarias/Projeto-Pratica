<?php 
session_start();
include "conexao.php";
if(isset($_GET['id_user_ponto']) && isset($_GET['ponto_id'])){
$id_user_ponto = htmlspecialchars($_GET['id_user_ponto'], ENT_QUOTES);
$id_ponto = htmlspecialchars($_GET['ponto_id'], ENT_QUOTES);

if ($id_user_ponto== $_SESSION['id']){

$apagar = $conn ->prepare("delete from pontos_turisticos where id = ? and user_id =?");
$apagar -> bindValue(1,$id_ponto);
$apagar -> bindValue(2,$id_user_ponto);
$apagar -> execute();

echo "<script>alert('deletado com sucesso')</script>";
header('location:../index.php');

}
}
else {


echo "<script>alert('errou')</script>";	
}
?>