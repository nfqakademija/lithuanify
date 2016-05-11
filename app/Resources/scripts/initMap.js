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

    var marker, i, j, totalArticles = 0;
    var newArticles = document.getElementsByTagName('article');
    for (i = 0; i < test.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(test[i][1], test[i][2]),
            map: map,
            animation: google.maps.Animation.DROP,
            title: test[i][0],
            icon: 'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_black'+
            test[i][3].length+'.png'
        });
        attachMarkerMessage(marker, test[i][0], test[i][3], test[i][4]);
        for (k = 0; k < test[i][3].length; k++) {
            newArticles[totalArticles].addEventListener('click', readArticle(test[i][3][k]));
            totalArticles ++;
        }
    }
}

function attachMarkerMessage(marker, countryName, articles, flag) {
    var countryFlag = '<img src=\"'+ assetsDir + flag+'\">';
    var message = countryFlag +
        '<b>' + countryName + '</b><br />Iš viso strapsnių: <b>' + articles.length + '</b>';
    var infowindow = new google.maps.InfoWindow({
        content: message
    });

    marker.addListener('click', function() {
        var i, articleList = '';

        infowindow.open(marker.get('map'), marker);

        var div = document.getElementById('js-load-articles');
        for (i = 0; i < articles.length; i++) {
            articleList += '<article class="read-toggle">'+
                '<div class="col-lg-2 col-md-2 col-sm-2">'+
                '<img src=\"'+ assetsDir + flag+'\">'+
            '</div>'+
            '<div class="col-lg-10 col-lg-10 sm-10">'+
                '<h5 style="margin-top: 0">'+articles[i][0].substring(0, 87)+'<br>'+
                '<small>'+
                articles[i][1].substring(0, 150)+
                '</small></h5>'+
                '</div>'+
                '</article>';
        }
        div.innerHTML = articleList;
        var newArticles = document.getElementsByTagName('article');
        for(i = 0; i < newArticles.length; i++)
        {
            newArticles[i].addEventListener('click', readArticle(articles[i]));
        }
        openMenu();
    });
}

function readArticle(article)
{
    var displayArticle = '<div class="well no-margin-bottom">' +
        '<button type="button" class="btn btn-primary btn-sm"' + 'onclick="closeArticle()">' +
        '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Uždaryti</button>' +
        '<h3>' + article[0] + '</h3>' + article[1] + '</div>';

    return function () {
        var article = document.getElementById('read-article');
        var contentWrapper = document.getElementById('page-content-wrapper');
        //contentWrapper.style.display = 'none';
        article.innerHTML = displayArticle;
        article.style.display = 'block';
    }
}

function closeArticle()
{
    var article = document.getElementById('read-article');
    var contentWrapper = document.getElementById('page-content-wrapper');
    //contentWrapper.style.display = 'block';
    article.style.display = 'none';
}

function openMenu()
{
    var menuOn = document.getElementById("menu-on");
    if(menuOn.style.display != 'none') {
        menuOn.click();
    }
}