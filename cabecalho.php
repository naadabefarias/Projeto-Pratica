
<div>
	<nav class="navbar navbar-default navbar-lg navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
      	Home
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  	
      <form class="navbar-form navbar-left">
        <div class="form-group" >
       	<div class="col-lg-4">
          <input type="text" name="form-controlpesq" id="form-controlpesq" class="form-control pesq" placeholder="Pesquise um ponto" autocomplete="off">
       	
        </div>
        </div>
       
        <button type="submit" class="btn btn-default">Pesquisa</button>
        <div id="locais" class="locais"></div>
      </form>
     
      <ul class="nav navbar-nav navbar-right">

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
            <li><a href="view_perfil.php">Atualizar Dados</a></li>
            <li><a href="#">Configurações</a></li>
            <li><a href="#">Adiministrar contas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Controller/action_logout.php">Logout</a></li>
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