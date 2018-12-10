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
      background-color: #ebeced;
     
    }

    div.container{
      background-color: white;
      padding-bottom: 3em;
      padding-top: 1em;
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

  .visu{
    margin-top: -4px;
  }


  .descricoes{
    display: inline-block;
    float: right;
    width: 45%;

  }

  .gallery{
    margin: auto;
    padding-top: 30px;
    /*margin-top: 15px;*/
  }

  .img{
    display: inline-block;
    width: 50%;
    height: 400px;
  }

  .avaliacoes{
  
    padding-top: 1em;
  }

  /*Formatação das Avaliações*/
  div.mediaAva{
  }

  div.fazerAva{
  }

  div.ava{
    border: 1px solid #cdd0d2;
    padding-left: 10px;
    padding-bottom: 1em;
    margin-top: 15px;

  }





  .estrelas input[type=radio]{
  display: none;
}.estrelas label i.fa:before{
  content: '\f005';
  color: #FC0;
}.estrelas  input[type=radio]:checked  ~ label i.fa:before{
  color: #CCC;
}
 
      
      #map {
        width: 100%;
    height: 330px; 
      }

 

}
</style>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<!--     <div cl<!--  -->
    
 
      
    <script type="text/javascript" src="js/slider.js"></script>
    
    <link rel="stylesheet" href="estilos/slider.css">

    <div class="container" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, .3); margin-top: 3.5em;">
    
    <div class="img">
      <img style="height: 400px; width: 100%;" src="upload/<?=$linha['imagem']?>">
    </div>
    
    <div class="descricoes" >
      <div class="desk">
        <h1><?= $linha['nome_ponto']?></h1>
        <h3><?= $linha['bairro']?></h3>
        <h3>Avaliações</h3>
        <?php
        $media = 0;
        $qnt_avaliacoes = $mediaOne->rowCount();

        foreach ($avaliacoes as $aval ) {
          // echo $aval['qnt_estrela'];
          $media += $aval['qnt_estrela'];
        }
        foreach ($mediaAna as $todas_aval) {
          $total_aval += $todas_aval['qnt_estrela'];
          
        }
        $media = $total_aval / $qnt_avaliacoes;
         ?>

         Média de (<?=number_format($media, 1, '.', ',')?> ) estrelas

        <h3>Como chegar</h3>
          API google maps
      </div>  
    </div>
    <div style="padding-top: 20px;">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Fotos</a></li>
          <li><a data-toggle="tab" href="#menu1">Avaliações</a></li>
          <li><a data-toggle="tab" href="#menu2">Localização</a></li>
        </ul>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
                <div class="gallery" style="width: 50%;">
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
                    <!-- <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg> -->
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
          </div>
          <div id="menu1" class="tab-pane fade">
                <div class="avaliacoes">
                  <div class="mediaAva ava">
                    <h3>Média de Avaliações</h3>
                      Média de ( <?=number_format($media, 1, '.', ',')?> ) estrelas<br> 
                      Número de avaliações  (<?=$qnt_avaliacoes?>)


                  </div>                
                  <div class="recenteAva ava">
                    <h3>Avaliações Recentes</h3>

                  </div>
  
                  <div class="fazerAva ava">
                      <h3 >Faça sua avaliação</h3>
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
                          
                          <input type="submit" value="Avaliar" class="btn btn-primary">
                          
                        </div>
                      </form>
                    </div> 

                      
                  </div>
              </div>    
          <div id="menu2" class="tab-pane fade">
            <h3>Maps</h3>
             <div id="map"></div><br><br>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-7.833909, -34.907374),
          zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('Controller/action_viewMarkers.php?id=<?=$id?>', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));


              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }
        



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXU9M6LguD4AXAmyallPd9_-p212i9xsg&callback=initMap">
    </script>
          </div>
            <!-- <div id=""></div><br><br> -->
      </div>
    </div>
    </div>
<!--     <div class="add_foto">
        <button id=btn_form>Adicionar Fotos</button>
        <form id="my_form" method="POST" action="Controller/action_add_imagem.php?ponto_id=<?=$id?>" enctype="multipart/form-data">
          <input type="file" name="imagem" required=""><br>
          <input type="submit" value="Adicionar">
        </form>
    </div> -->


    </div>
<!--     <div class="container">
      <div class="page-header">
        <h1>Descrições</h1>
      </div>
      <div style="margin-left: 20px;">
        <p><?=$linha['descricao']?></p>
      </div>
    </div>
    
    <br>
    <br>

          
        
    </div>

      

      
      <!-- /.row -->

      <!-- Related Projects Row -->
      <div class="container" style="box-sizing: border-box; margin-top: 10px;
       border-radius: 4px; box-shadow: 3px; box-shadow: 0px 0px 5px rgba(0, 0, 0, .3);">
        <div class="page-header" style="padding-top: 0px;">
          <h2 class="my-4">Outros pontos turisticos:</h2>
        </div>  
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
    
</body>
</html>