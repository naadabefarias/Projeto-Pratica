<?php

require_once('view_header.php');
$id = $_GET['id'];
$pesquisa = $_POST['search'];
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
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4"><?=$linha['nome_ponto'];?>
        <small>Aqui será o apelido ou um nome carinhoso do ponto</small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8 img" >
          <img class="img-fluid img1"  src="upload/<?=$linha['imagem'];?>" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Descrição do ponto:</h3>
          <p>Aqui será colocada uma breve descrição do ponto turistico.</p>
          <h3 class="my-3">Detalhes deste ponto:</h3>
          <ul>
            <li>Logradouro: <strong><?=$linha['logradouro'];?></strong></li>
            <li>Bairro: <strong><?=$linha['bairro'];?></strong></li>
            <li>Número do ponto: <strong><?=$linha['numero_ponto'];?></strong></li>
          </ul>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Outros pontos turisticos:</h3>
<div class="row">
 <?php   $ativoCarr = 0;
$consultei = $conn -> query("SELECT id, nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos;");        while($linha = $consultei -> fetch(PDO::FETCH_ASSOC)):
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
    