<php include "conexão.php">

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
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
                        infowindow.setContent(results[1].formatted_address);
                        infowindow.open(map, marker);
                        document.getElementById("address").value = results[1].formatted_address;
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

</head>
<body>
   <div class="w3-top">
    <nav class="w3-bar top-bar expanded" data-topbar role="navigation">
       
  
        <div class="navbar a">
            <a href="../" class="link-seliga w3-bar-item w3-button prin" style="color: white;font-size:  40px;" >Se Liga</a>
            <a href="../contacts/add" class="link-contato w3-bar-item w3-button w3-right" style="color: white;font-size:  20px;" >Fale Conosco</a>
        </div>
          </nav>
      </div>
<div id="map"></div> 

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALb41AS7lJYvUw95sB2drZHwEu6SY6yBs&callback=initMap">
      </script>
<div id="submit"></div>
<div id="left" align="left">
    <div class="inicio">
<fieldset style="padding-top: 30px;">
    <input disabled="disabled" type="hidden" id="latlng" value="40.714224,-73.961452">
        <legend><?=('Registrar Crime') ?></legend>
    
        <?php
            echo $this->Form->control('name',['label' => 'Nome']);
            echo $this->Form->control('address',['label' => 'Selecione no mapa o local do ocorrido)', 'id' => 'address']);
            echo $this->Form->control('title',['label' => 'Título']);
            echo "<label>Data / Hora</label>";
            echo $this->Form->control('Date',['type' => 'datetime', 'label' => '' ,'empty' => true]);
            echo $this->Form->control('Description',['label' => 'Descrição', 'type' => 'textarea']);
             echo "<label>Tipo de Ocorrência</label>";
            echo $this->Form->control('type',['label' => '', 'type' => 'select', 'options' => ['assassinato' => 'Assassinato','Latrocinio','Espancamento','Feminicidio','Infanticídio','Furto','Roubo']]);
            echo $this->Form->control('lat',['id'=>'lat', "type" => "hidden"]);
            echo $this->Form->control('lng',['id' => 'lng', "type" => "hidden"]);            

        ?>
            <?= $this->Form->submit(('Registrar')) ?>
            <?= $this->Form->end() ?>
        </fieldset>
    </div>
</fieldset>
    
 </div>
</div>
</body>
</html>