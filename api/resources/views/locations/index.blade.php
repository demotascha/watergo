<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&.js&key=AIzaSyBFl89Khv5djG8jK2gAjkcMoBIkkpY8cT8"></script>
    <script src="https://rawgit.com/HPNeo/gmaps/master/gmaps.js"></script>
    <script src="https://rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>

    <style type="text/css">
        #mymap {
            border:1px solid red;
            width: 800px;
            height: 500px;
        }
    </style>

</head>
<body>

<h1>Laravel 5 - Multiple markers in google map using gmaps.js</h1>

<div id="mymap"></div>

<script type="text/javascript">

    var locations = <?php print_r(json_encode($locations)) ?>;

    var center = new google.maps.LatLng(25.025543, 121.463530);
    var map = new google.maps.Map(document.getElementById('mymap'), {
        zoom: 14,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });


    var markers = [];
    $.each( locations, function( index, value ) {
        var latLng = new google.maps.LatLng(value.lat,
                value.lng);
        var marker = new google.maps.Marker({
            position: latLng,
            infoWindow: {
                content: '<p>'+ value.name +'</p>'
            }
        });
        markers.push(marker);
    });
    var markerCluster = new MarkerClusterer(map, markers, {imagePath: '../images/m'});

</script>

</body>
</html>