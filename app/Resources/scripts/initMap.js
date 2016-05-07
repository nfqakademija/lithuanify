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
            title: test[i][0],
            icon: 'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_black'+
            test[i][3].length+'.png'
        });
        attachSecretMessage(marker, test[i][0], test[i][3]);
    }
}

function attachSecretMessage(marker, countryName, articles) {
    var message = '<b>' + countryName + '</b><br />Iš viso strapsnių: <b>' + articles.length + '</b>';
    var infowindow = new google.maps.InfoWindow({
        content: message
    });

    marker.addListener('click', function() {
        var i, articleList;

        infowindow.open(marker.get('map'), marker);

        var div = document.getElementById('js-load-articles');
        for (i = 0; i < articles.length; i++) {
            articleList += '<article class="read-toggle"><h4>' + articles[i][0].substring(0, 87) + '</h4>' +
                '<img class="littleSpaceRight" width="105px" src="http://g2.dcdn.lt/images/pix/arunas-70820028.jpg" ' +
                'style="float: left;" /> <p>' + articles[i][1].substring(0, 150) + '</p> </article>';
        }

        div.innerHTML = articleList;
    });
}