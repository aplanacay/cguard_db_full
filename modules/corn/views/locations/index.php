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
        /*
        var locations = [
          ['Bondi Beach', -33.890542, 151.274856],
          ['Coogee Beach', -33.923036, 151.259052],
          ['Cronulla Beach', -34.028249, 151.157507],
          ['Manly Beach', -33.80010128657071, 151.28747820854187],
          ['Maroubra Beach', -33.950198, 151.259302]
        ];
        */
   
       var locations = <?php echo json_encode($locations); ?>;
       
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: new google.maps.LatLng(locations[0][1],locations[0][2]),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var markers = new Array();
        for (i = 0; i < locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          });
          markers.push(marker);
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
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