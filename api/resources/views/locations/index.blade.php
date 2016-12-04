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
    function initialize() {
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
                position: latLng
            });
            attachSecretMessage(marker, '<p>'+ value.name +'</p>');
            markers.push(marker);
        });
        // This event listener calls addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'rightclick', function(event) {
            var marker = new google.maps.Marker({
                position: event.latLng,
                infoWindow: {
                    content: '<p>'+ 'jskfld' +'</p>'
                }
            });
            //markers.push(marker);
            if (markerCluster) {
                markerCluster.addMarker(marker, true);
            }
        });
        var markerCluster = new MarkerClusterer(map, markers, {imagePath: '../images/m'});
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    // Attaches an info window to a marker with the provided message. When the
    // marker is clicked, the info window will open with the secret message.
    function attachSecretMessage(marker, secretMessage) {
        var infowindow = new google.maps.InfoWindow({
            content: secretMessage
        });
        marker.addListener('mouseover', function() {
            infowindow.open(marker.get('map'), marker);
        });
        marker.addListener('mouseout', function() {
            infowindow.close();;
        });
    }
</script>

</body>
</html>