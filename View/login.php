<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bem Vindos ao Login</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="estilos/Login_Style.css">
</head>
<body id="loginphp">

<div class="wrapper fadeInDown">
  <div id="formContent"> 
    <!-- Guias de Titulos -->

    <!-- Icone -->
    <div class="fadeIn first">
      <img src="SantaCruz.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login do Formulario -->
    <form action="../Controller/auth.php" method="POST">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario">
      <input type="text" id="password" class="fadeIn third" name="senha" placeholder="Senha">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Lembrar Senha -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Cadastre-se</a>
    </div>

  </div>
</div>
	
</body>
</html>