

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Add a default marker to a web map</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <style>
    body { margin: 0; padding: 0; }
    #map { position: absolute; top: 0; bottom: 0; width: 30%; }
    </style>
    </head>
    <body>
    <div id="map"></div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoicGF1bGFvMzgiLCJhIjoiY2t6ZWlheXhpMzhxcTJvbms2cmdobnQ2cCJ9.SDGZJ25JchyDA7BT4VgK2Q';
    const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-74.297333,4.570868],
    zoom: 8
    });

    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker()
    .setLngLat([-74.08175,4.60971])//latitud y longitud
    .addTo(map);

    // Create a default Marker, colored black, rotated 45 degrees.
   /* const marker2 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
    .setLngLat([12.65147, 55.608166])
    .addTo(map);*/
    </script>

    </body>
    </html>
