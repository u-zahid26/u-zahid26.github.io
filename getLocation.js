function getLocation(){
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(p) {
            console.log(p);
            var lat = p.coords.latitude;
            var long = p.coords.longitude;
            var pos = { lat: lat, lng: long};
        });

        return pos; 
    }
}