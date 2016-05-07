/**
 * Created by Rokas on 23/04/16.
 */
function initMap() {
    var myLatLng = {lat: 50, lng: 15};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 4,
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

    var marker, i;

    for (i = 0; i < test.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(test[i][1], test[i][2]),
            map: map,
            animation: google.maps.Animation.DROP,
            icon: 'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_black'+
            test[i][3].length+'.png'
        });
    }
}
