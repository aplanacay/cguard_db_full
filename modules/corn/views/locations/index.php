<?php
use yii\helpers\Url;
?>

<h1>Locations</h1>
 
<div id="map"></div>

    <script type="text/javascript">
       /* function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }*/
     
    function initMap(){    

       var locations = <?php echo json_encode($locations); ?>;
      
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: new google.maps.LatLng('12.8797','121.7740'),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var markers = new Array();
        var icon = {
           
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };



        for (i = 0; i < locations.length; i++) {
          
          marker = new google.maps.Marker({
            icon: '<?php echo Yii::$app->getBaseUrl(true).'/images/Marker-52.png'; ?>',
            position: new google.maps.LatLng(locations[i][4], locations[i][5]),
            map: map
          });
          markers.push(marker);
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              var phlNumber = '<p>PHL No: '+locations[i][0]+'</p>';
              var gbNumber = '<p>GB No: '+locations[i][1]+'</p>';
              var oldAccNumber = '<p>Old Accession No: '+locations[i][2]+'</p>';
              var otherNumber = '<p>Other No: '+locations[i][3]+'</p>'; 
              var germplasmUrl = '<?php echo Url::to(['/corn/view/index?GermplasmSearch%5Bid%5D=']); ?>';
              var link = '<a href="'+germplasmUrl+locations[i][6]+'">Show more information</a>';
              infowindow.setContent(phlNumber+gbNumber+oldAccNumber+otherNumber+'<br/>'+link);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }
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