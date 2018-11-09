<?php
require_once('view_header.php');
$id = $_GET['id'];//id do ponto
// $pesquisa = $_POST['search'];
  // $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT * FROM pontos_turisticos WHERE id='$id'"); 
  $linha = $consulta -> fetch(PDO::FETCH_ASSOC); 
?>
<style>
      body {
      padding-top: 54px;
    }

    @media (min-width: 992px) {
      body {
        padding-top: 56px;
      }
    .img1{
    width: 750px;
    height: 500px;
    border-radius:10%;
  }
  .img2{
    width: 250px;
    height: 150px;
  border-radius: 10%;
  }
}
</style>
<!--     <div cl<!--  -->

      <div class="w3-content" style="max-width:950px; background-color: lightgrey; padding: 50px">
        <h1>Galeria de Fotos do Ponto</h1>
        <img class="mySlides" src="upload/<?=$linha['imagem'];?>" style="width:100%; display:none; max-height: 500px">
        <img class="mySlides" src="upload/<?=$linha['imagem'];?>" style="width:100%; max-height: 500px">
        <img class="mySlides" src="upload/<?=$linha['imagem'];?>" style="width:100%;display:none; max-height: 500px">

        <div class="w3-row-padding w3-section">
          <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off" src="upload/<?=$linha['imagem'];?>" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
          </div>
          <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off" src="upload/<?=$linha['imagem'];?>" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
          </div>
          <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off" src="upload/<?=$linha['imagem'];?>" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
          </div>
        </div>
        <?= include "avalie.php"; ?>
      </div>

<script>
function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>
      
      <!-- /.row -->

      <!-- Related Projects Row -->
      <div class="container" style="margin-top: 3em">
      <h3 class="my-4">Outros pontos turisticos:</h3>
<div class="row">
 <?php   $ativoCarr = 0;
$consultei = $conn -> query("SELECT id, nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos;");   
     while($linha = $consultei -> fetch(PDO::FETCH_ASSOC)):
            if ($ativoCarr <= 3):?>
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="view_visualizar_pontos.php?id=<?=$linha['id'];?>">
            <img class="img-fluid img2" src="upload/<?=$linha['imagem'];?>" alt="">
                <br><br><h3><?=$linha['nome_ponto'];?></h3>    
          </a>
        </div>
<?php       $ativoCarr++;
            endif;
          endwhile?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<!-- RODAPÉ -->
<style type="text/css">
	
	#teste {
		margin-top: 25px;
	}

</style>
<div id="teste">
<?php 
	require_once('view_footer.html');
?>
</div>
    