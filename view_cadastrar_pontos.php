<?php
require_once('view_header.php');
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit();
}

?>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Mali');
body {

	margin-top: 25px;
}
  
/*.pesq{
	margin-top: 7px;
	margin-left: 7px;
*/}
form {
	margin-top: 5em;
}
.container{
	margin-top: 6em;
	height: 800px;	
}

#titulo_cadastro {
	font-family: 'Mali', cursive;
}


</style>
<link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
	 <script type="text/javascript">
        var marker = null;
        function myMap() {
            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;
            var myCenter = new google.maps.LatLng(-7.830136823,-34.903713147);
            var mapCanvas = document.getElementById("map");
            var mapOptions = {center: myCenter, zoom: 14, mapTypeId: 'roadmap'};
            var map = new google.maps.Map(mapCanvas, mapOptions);

            map.addListener('click', function(e) {
                var markerLatLng = e.latLng;
                document.getElementById("latlng").value = e.latLng.lat() + "," + e.latLng.lng();

                document.getElementById("lat").value = e.latLng.lat()
                document.getElementById("lng").value = e.latLng.lng();

                geocodeLatLng(geocoder, map, infowindow);
            });
        }
        function geocodeLatLng(geocoder, map, infowindow) {
            if (marker) {
                marker.setMap(null);
            }
            var input = document.getElementById('latlng').value;
            var latlngStr = input.split(',', 2);
            var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        infowindow.setContent(results[1].formatted_logradouro);
                        infowindow.open(map, marker);
                        document.getElementById("logradouro").value = results[1].formatted_logradouro;
                    } 
                    else {
                        window.alert('No results found');
                    }
                } 
                else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }
    </script>
<div class="ui container">
	<h1 id="titulo_cadastro"> Cadastro de Pontos Turísticos </h1>
	<form method="post" action="Controller/action_cadastrar_ponto.php" class="ui form" enctype="multipart/form-data">
		<label><h3>Nome do Ponto Turístico </h3></label>
		<input type="text" name="nome_ponto" placeholder="Nome do Ponto Turístico" required=""><br><br>
		<label> <h3>Latitude </h3></label>
		<input type="text" name="lat" placeholder="Latitude" required=""><br><br>
		<label> <h3>Longitude </h3></label>
		<input type="text" name="lng" placeholder="Longitude" required=""><br><br>
		<label> <h3>Logradouro </h3></label>
		<input type="text" name="logradouro" placeholder="Logradouro" required=""><br><br>
		<label> <h3>Bairro </h3></label>
		<input type="text" name="bairro" placeholder="Bairro" required=""><br><br>
		<label> <h3>Número </h3></label>
		<input type="text" name="numero" placeholder="Número" ><br><br>
		<label> <h3>Descrição: </h3></label>
		<input type="text" name="descricao" placeholder="Descrição" ><br><br>
		<label> <h3>Imagem </h3></label>
		<input type="file" name="imagem" placeholder="Imagem" ><br><br>
    <label for="sel1">Selecione o tipo de ponto:</label>
      <select class="form-control" name="categoria">
        <option value="igreja">Igrejas Históricas</option>
        <option value="monumento">Monumentos Antigos</option>
        <option value="museu">Museus Históricos</option>
        <option value="naturezaparques">Natureza e Parques</option>
        <option value="praia">Praia</option>
        <option value="praca">Praça</option>
        <option value="rio">Rio</option>
      </select>
		<input type="submit" value="Cadastrar" class="ui primary button">
	

	</form>
</div>

<?php 
	
	require_once('view_footer.html');
 ?>