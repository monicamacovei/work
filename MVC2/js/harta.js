//access tokenul pt api-ul mapbox
let access_token = 'pk.eyJ1Ijoibmljb2w4MSIsImEiOiJja2I0azY3d2UwankzMnlvOXdkaWpjanhvIn0.n0xmuVv-hZhCNKj4QeDN-A';
//vectorii in care voi stoca coodonatele geografice ale judetelor
let lat = [];
let long = [];

//functia in care apelez api-ul de la mapbox
function geo(url) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {

            if (xhttp.status === 200 || xhttp.status == 0) {
                //parsez jsonul primit ca raspuns
                var jsonResponse = JSON.parse(xhttp.responseText);
                long.push(jsonResponse["features"][0]["geometry"]["coordinates"][0]);
                lat.push(jsonResponse["features"][0]["geometry"]["coordinates"][1]);

            }
        }

    };
    //efectuez requestul de tip GET la url-ul dat ca parametru
    xhttp.open("GET", url, false);
    xhttp.send(null);

}
function setare_coordonate() {

    for (var i = 0; i < nume.length; i++) {
        //inlocuiesc acolo unde e cazul spatiul cu caracterul specific pt adrese url
        var judet = nume[i].replace(/\s+/g, '%20');

        //construiesc url-ul specificand api-ul,actiunea pe care
        var url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + judet + '%20Romania.json?access_token=' + access_token + '&limit=1';
        geo(url);
    }


}
setare_coordonate();
function attachSecretMessage(marker, contentString) {
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    marker.addListener('click', function () {
        infowindow.open(marker.get('map'), marker);
    });
    marker.addListener('mouseout', function () {
        infowindow.close();
    });
}

var map;
function initMap() {
    // Create the map.
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6.5,
        center: { lat: 45.9442858, lng: 25.0094303 },
        icon: {
            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
        },
        mapTypeId: 'terrain'
    });

    for (var i = 0; i < 42; i++) {
        var contentString = '<div id="content">' +
            '<h2 id="siteNotice">' + nume[i] + '<br>' +
            '</h2>' +
            '<p >' + sume[i] +
            '</p>' +
            '</div>';


        var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: 'blue',
            fillOpacity: 0.35,
            map: map,
            center: { lat: lat[i], lng: long[i] },
            radius: sume[i] / 17
        });
        var marker = new google.maps.Marker({
            map: map,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            },
            position: { lat: lat[i], lng: long[i] }
        });
        attachSecretMessage(marker, contentString);



    }
}