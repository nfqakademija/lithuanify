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

    var locations = [
        ["title",-14.2350040,-51.9252800,3],
        ["title",-34.028249, 151.157507,25],
        ["title",39.0119020,-98.4842460, 2],
        ["title",48.8566140,2.3522220, 67],
        ["title",38.7755940,-9.1353670, 53],
        ["title",12.0733335, 52.8234367, 100],
        ["Poland", 51.919438, 19.145136, 14],
        ["Latvia", 56.879635, 24.603189, 10],
        ["Switzerland", 46.818188, 8.227512, 3]
    ];
    //var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            animation: google.maps.Animation.DROP,
            icon: 'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_black'+
            locations[i][3]+'.png'
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                //infowindow.setContent(locations[i][0]);
                //infowindow.open(map, marker);
            }
        })(marker, i));
    }
}