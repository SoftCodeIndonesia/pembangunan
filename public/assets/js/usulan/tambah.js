
function initMap() {
    var myCenter = new google.maps.LatLng(29.714954, 32.368546);
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: myCenter,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
        content: "Klik untuk mendapatkan garis latitude dan longitude",
        position: myCenter,
    });
    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );

        infoWindow.open(map);

        var jsonLatLang = mapsMouseEvent.latLng.toJSON();
        console.log(mapsMouseEvent.latLng.toJSON().lat);
        $('#lat').val(jsonLatLang.lat)
        $('#lng').val(jsonLatLang.lng)

    });
}