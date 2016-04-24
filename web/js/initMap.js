/**
 * Created by Rokas on 23/04/16.
 */
function initMap() {
    var myLatLng = {lat: 20, lng: 0};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 3,
        styles: [{
            featureType: 'poi',
            stylers: [{ visibility: 'off' }]  // Turn off points of interest.
        }, {
            featureType: 'transit.station',
            stylers: [{ visibility: 'off' }]  // Turn off bus stations, train stations, etc.
        }],
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        streetViewControl: false
    });
    var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        animation: google.maps.Animation.DROP,
        title: 'Lithuanify'
    });
    var contentString =
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Malis</h1>'+
        '<div id="bodyContent">'+
        '<p><b>Malis</b>, <b>30</b> straipsnių.</p>'+
        '</div>';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
}