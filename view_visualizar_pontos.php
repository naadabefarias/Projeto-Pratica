<?php
require_once('view_header.php');
$id = $_GET['id'];//id do ponto
// $pesquisa = $_POST['search'];
  // $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT * FROM pontos_turisticos WHERE id='$id'"); 
  $linha = $consulta -> fetch(PDO::FETCH_ASSOC); 
$stmt = $conn -> query("SELECT * FROM imagens WHERE ponto_id= '$id'");


$user_id = $_SESSION['id'];
$avaliacao = $conn->query("SELECT * FROM avaliacoes WHERE ponto_id = '$id' and user_id = '$user_id'");
$avaliacoes = $avaliacao->fetchAll();
$mediaOne = $conn->query("SELECT * FROM avaliacoes WHERE ponto_id = $id");   
$mediaAna = $mediaOne->fetchAll();
?>
<script>
document.title= "Ponto | "+ "<?php echo $linha['nome_ponto']; ?>";
 </script>
<script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
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

  h1.inf{
    font-size: 50pt;
  }
  h2.inf{
    font-size: 30pt;
  }

  form#my_form{
    display: none;
  }
  .add_foto{
    margin-top: 20px;
    margin-left: 80px;
  }
  .desc{
    /*background-color: blue;*/
    color: white;
    height: 31em;
  }
  .visu{
    margin-top: -4px;
  }


  .descricoes{
    display: inline-block;
    float: right;
    width: 50%;
  }

  .gallery{
    display: inline-block;
  }

  .desk{
    margin-left: 20px;
  }

  .estrelas input[type=radio]{
  display: none;
}.estrelas label i.fa:before{
  content: '\f005';
  color: #FC0;
}.estrelas  input[type=radio]:checked  ~ label i.fa:before{
  color: #CCC;
}

 

}
</style>
<!--     <div cl<!--  -->
    
 
      
    <script type="text/javascript" src="js/slider.js"></script>
    
    <link rel="stylesheet" href="estilos/slider.css">

    
    <div class="gallery" style="width: 50%">
    <div id="jssor_1" style="position:relative;top:0px;left:0px;width:980%;height:600px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:500px;overflow:hidden;">
            <div>
                <img class="galery" data-u="image" src="upload/<?=$linha['imagem'];?>" />
                <img data-u="thumb" src="upload/<?=$linha['imagem'];?>" />
            </div>

            <?php while($imagem = $stmt -> fetch(PDO::FETCH_ASSOC)): ?>
              <div>
                <img class="galery" data-u="image" src="img/<?=$imagem['img'];?>" />
                <img data-u="thumb" src="img/<?=$imagem['img'];?>" />
              </div>
            <?php endwhile ?>  
            
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:190px;height:90px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    </div>
    
    <div class="descricoes">
      <div class="container desk">
        <h1><?= $linha['nome_ponto']?></h1>
        <h3><?= $linha['bairro']?></h3>
        <p>Avaliações</p>
        <?php
        $media = 0;
        $qnt_avaliacoes = $mediaOne->rowCount();

        foreach ($avaliacoes as $aval ) {
          $media += $aval['qnt_estrela'];
        }
        $media = $media / $qnt_avaliacoes;
         ?>

         <p>Média de ( <?=$media?> ) estrelas<br> 
          Número de avaliações  (<?=$qnt_avaliacoes?>)</p>

        <h3>Como chegar</h3>
        <p>API google maps</p>
      </div>  
    </div>
    <div class="add_foto">
        <button id=btn_form>Adicionar Fotos</button>
        <form id="my_form" method="POST" action="Controller/action_add_imagem.php?ponto_id=<?=$id?>" enctype="multipart/form-data">
          <input type="file" name="imagem" required=""><br>
          <input type="submit" value="Adicionar">
        </form>
    </div>


    </div>
    <div class="container">
      <div class="page-header">
        <h1>Descrições</h1>
      </div>
      <div style="margin-left: 20px;">
        <p><?=$linha['descricao']?></p>
      </div>
    </div>
    
    <br>
    <br>
    <div class="container avaliacoes">
      <div class="page-header">
          <h2>Faça sua avaliação</h4>
          <form method="POST" action="/Controller/action_avaliar.php?id=<?=$linha['id']?>" enctype="multipart/form-data">
      <div class="estrelas">
        <input type="radio" id="vazio" name="estrela" value="" checked>
        
        <label for="estrela_um"><i class="fa"></i></label>
        <input type="radio" id="estrela_um" name="estrela" value="1"<?php if ($aval['qnt_estrela'] == 1) :?> checked <?php endif;?> 
        >
        
        <label for="estrela_dois"><i class="fa"></i></label>
        <input type="radio" id="estrela_dois" name="estrela" value="2"<?php if ($aval['qnt_estrela'] ==2):?> checked <?php endif;?>>
        
        <label for="estrela_tres"><i class="fa"></i></label>
        <input type="radio" id="estrela_tres" name="estrela" value="3"<?php if ($aval['qnt_estrela'] ==3):?> checked <?php endif;?>>
        
        <label for="estrela_quatro"><i class="fa"></i></label>
        <input type="radio" id="estrela_quatro" name="estrela" value="4"<?php if ($aval['qnt_estrela'] ==4) :?> checked <?php endif;?>>
        
        <label for="estrela_cinco"><i class="fa"></i></label>
        <input type="radio" id="estrela_cinco" name="estrela" value="5"<?php if ($aval['qnt_estrela'] ==5) :?> checked <?php endif;?><br><br>
        
        <input type="submit" value="Avaliar" class="btn btn-  primary">
        
      </div>
    </form>
      </div>
          
        
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
  var btn = document.getElementById('btn_form');
  var form = document.getElementById('my_form');
  btn.addEventListener('click', function() {
    form.style.display = 'block';
    btn.style.display = 'none';
});
</script>
      
      <!-- /.row -->

      <!-- Related Projects Row -->
      <div class="container" style="margin-top: 3em">
      <h3 class="my-4">Outros pontos turisticos:</h3>
<div class="row">
 <?php   $ativoCarr = 0;
$consultei = $conn -> query("SELECT id, nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos
  WHERE id!= $id;");   
     while($linha = $consultei -> fetch(PDO::FETCH_ASSOC)):
            if ($ativoCarr <= 3):?>
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="view_visualizar_pontos.php?id=<?=$linha['id'];?>">
            <img class="img-fluid img2" src="upload/<?=$linha['imagem'];?>" alt="">
                <br><h3><?=$linha['nome_ponto'];?></h3>    
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
    
</body>
</html>