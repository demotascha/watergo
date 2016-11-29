<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&.js&key=AIzaSyBFl89Khv5djG8jK2gAjkcMoBIkkpY8cT8"></script>
    <script src="https://rawgit.com/HPNeo/gmaps/master/gmaps.js"></script>

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

    var mymap = new GMaps({
        el: '#mymap',
        lat: 25.025543,
        lng: 121.463530,
        zoom: 14
    });

    $.each( locations, function( index, value ) {
        mymap.addMarker({
            lat: value.lat,
            lng: value.lng,
            infoWindow: {
                content: '<p>'+ value.name +'</p>'
            }
        });
    });

</script>

</body>
</html>