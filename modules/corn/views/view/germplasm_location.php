<?php
use yii\helpers\Url;

$latitude = !empty($germplasm->latitude) ? $germplasm->latitude : '';
$longitude = !empty($germplasm->longitude) ? $germplasm->longitude : '';
?>

<h1>Location</h1>
 

<div id="map"></div>

    <script type="text/javascript">

     
    function initMap(){    

       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: new google.maps.LatLng(''.<?= $latitude; ?>,''.<?= $longitude; ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(''.$latitude,''.$longitude),
          map: map
        });
    }
    
  </script> 
  
    <script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA__FP7evjIH-j60EnKNbfdAtVAT5ZWbOM&callback=initMap">

    </script>
    
<style>
    #map{
        width: 100%;
        height: 700px;
    }
</style>   