<?php 
require_once('../Controller/conexao.php');
  session_start();
$id = $_GET['id'];
  // $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT * FROM pontos_turisticos WHERE id='$id'"); 
  $linha = $consulta -> fetch(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../estilos/index-style.css">
    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">

  </head>
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
  }
  .img2{
    width: 500px;
    height: 300px;
  }
}
</style>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="../images/icon-ponto.png" alt="imagem" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <center><h1 class="my-4"><?=$linha['nome_ponto'];?><br>
        <small>Aqui será o apelido ou um nome carinhoso do ponto</small>
      </h1></center>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8 img" >
          <img class="img-fluid img1"  src="../upload/<?=$linha['imagem'];?>" alt="">
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
          <a href="visualizar.php?id=<?=$linha['id'];?>">
            <img class="img-fluid img2" src="../upload/<?=$linha['imagem'];?>" alt="">
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

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
