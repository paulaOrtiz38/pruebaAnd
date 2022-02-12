

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Add a default marker to a web map</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <style>

    #map {top: 0; bottom: 0; width:80%; height: 300px; }
    </style>
    </head>
    <body>
    <div id="map"></div>

    <script>
         $( document ).ready(function() {
        let coordenadas = @json($coordenadas);


        mapboxgl.accessToken = 'pk.eyJ1IjoicGF1bGFvMzgiLCJhIjoiY2t6ZWlheXhpMzhxcTJvbms2cmdobnQ2cCJ9.SDGZJ25JchyDA7BT4VgK2Q';
    const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [-74.297333,4.570868],
    zoom: 5
    });

    // Create a default Marker and add it to the map.
    console.log( coordenadas );

    coordenadas.forEach(element => {
        console.log(element.latitud);
        console.log(element.longitud);

        const marker1 = new mapboxgl.Marker()
    .setLngLat([element.latitud,element.longitud])//latitud y longitud
    .addTo(map);
    });


    // Create a default Marker, colored black, rotated 45 degrees.
   /* const marker2 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
    .setLngLat([12.65147, 55.608166])
    .addTo(map);*/
});
    </script>

    </body>
    </html>
