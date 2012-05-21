
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAXQYArogBkCghNhv6o2B22iT7fbVO5BLU&sensor=true">
    </script>
    <script type="text/javascript">
      function initialize() {
        var myOptions = {
          center: new google.maps.LatLng(-6.195851,106.840553),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
      }
    </script>
  </head>
  <body onload="initialize()">
    <div id="test1"><div id="test2"><div id="map_canvas" style="width:50%; height:50%"></div></div></div>
  </body>
</html>



