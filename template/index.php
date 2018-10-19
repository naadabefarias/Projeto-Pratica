<?php 
require_once('../Controller/conexao.php');

  // $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT id, nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos;"); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seu Ponto Turístico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
      max-height: 400px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
    .logo{
  margin-top: -15px;
  height: 2em;
  width: 10em;
}
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="../images/icon-ponto.png" alt="imagem" class="logo">
      </a>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
     <?php 
        if (!isset($_SESSION['user'])){
      ?>



    <li class="menu-item4">
      <button type="button" id='cadastro' class="btn btn-info modais" data-toggle="modal" data-target="#myCadastro">Sign Up  <span class="glyphicon glyphicon-user"></span></button>
    </li>
        <li id="" class="menu-item4">
      <button type="button" id='login' class="btn btn-info modais" data-toggle="modal" data-target="#myModal">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
    </li>



      <?php  
        }else{
      ?>      

        <ul class="nav navbar-nav">
          <li><a href="view_cadastrar_pontos.php">Cadastrar Pontos</a></li>
        </ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="view_perfil.php">Perfil</a></li>
            <li><a href="#">Configurações</a></li>
            <li><a href="#">Adiministrar contas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../Controller/action_logoutTeste.php">Logout</a></li>
          </ul>
        </li>
      <?php 
        } 

      ?>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
  <!-- MODAL DE LOGIN -->
  <?php  
    if (isset($_GET['error'])){
  ?>
    <div class="alert alert-danger" role="alert">Login ou senha inválido!</div>   
  <?php  }

  ?>
   <!-- Primeiro modal-->
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Login</h2>
            </div>
            <div class="modal-body">
              <form action="../Controller/action_authTeste.php" method="POST">
              <div class="form-group">
                <label for="login">Usuário:</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>
            <div class="form-group">
              <label for="pwd">Senha:</label>
                <input type="password" class="form-control" id="pwd" name="senha">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Lembrar de mim</label>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </form>
            </div>
        </div>
    </div>
    </div>
       
    <!-- Segundo modal -->
  <div class="modal fade" id="myCadastro" role="dialog">
      <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Cadastro</h2>
            </div>
            <div class="modal-body">
              <form action="../Controller/action_cadastrar_usuarioTeste.php" method="POST">
              <div class="form-group">
                <label for="email">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="form-group">
                <label for="login">Usuário:</label>
                <input type="text" class="form-control" id="login" name="user">
              </div>
            <div class="form-group">
              <label for="pwd">Senha:</label>
                <input type="password" class="form-control" id="pwd" name="pass">
            </div>
            <div class="form-group">
              <label for="pwd">Confirme a Senha:</label>
                <input type="password" class="form-control" id="pwd2" name="senha2">
            </div>
            
              <button type="submit" class="btn btn-primary btn-block">Cadastrar-se</button>
          </form>
            </div>
        </div>
    </div>
    </div>
    </div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php     $ativo = 0;
        while ($ativo < 3):
            if ($ativo == 0) { ?>
              <li data-target="#myCarousel" data-slide-to="<?=$ativo;?>" class="active"></li>
        <?php $ativo++;
          }else{
          if($ativo <= 2):?>
                <li data-target="#myCarousel" data-slide-to="<?=$ativo;?>"></li>
            <?php $ativo++; ?>
        <?php endif;    
          }
          endwhile ?>

      </ol>


    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    <?php   $ativoCarr = 0;
          while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)):
            if ($ativoCarr == 0) {?>
              <div class="item active">
                <a href="visualizar.php?id=<?=$linha['id']?>">  
                  <img src="../upload/<?=$linha['imagem'];?>" alt="Image" accept=".png, .jpg, .jpeg">
                  <div class="carousel-caption">
                    <h3><?=$linha['nome_ponto'];?></h3>
                    <p><?=$linha['logradouro'];?></p>
                  </div>      
                </a>
              </div>
 <?php  $ativoCarr++;
            }else{
              if ($ativoCarr <= 2): ?>
              <div class="item">
                <a href="visualizar.php?id=<?=$linha['id']?>">  
                  <img src="../upload/<?=$linha['imagem'];?>" alt="Image" accept=".png, .jpg, .jpeg">
                  <div class="carousel-caption">
                    <h3><?=$linha['nome_ponto'];?></h3>
                    <p><?=$linha['logradouro'];?></p>
                  </div>      
                </a>
              </div>
        <?php   $ativoCarr++;
              endif;
            };
          endwhile;
?>
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  <!-- Container embaixo do carousel -->
<div class="container text-center">    
  <h3>Melhores Pontos Turisticos da Região</h3><br>
    <?php $v = 0;
    $consultei = $conn -> query("SELECT id, nome_ponto, imagem FROM pontos_turisticos;");
        while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
        if ($v <= 4 ):?>
         <div class="grande">
              <div class="col-sm-4">
                <a href="visualizar.php?id=<?=$linha1['id']?>">  
                  <img src="../upload/<?=$linha1['imagem'];?>" class="img-responsive" style="width: 25em;  height: 15em;" alt="Image">
                  <p><?=$linha1['nome_ponto'];?></p>
                </a>
              </div>
          </div>    
  <?php  $v++;
          endif; 
        endwhile
    ?>   
   
</div><br>


</body>
</html>
