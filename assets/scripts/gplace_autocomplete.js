jQuery(document).ready(function ($) {
    $("#title-prompt-text").html('');
    var input = /** @type {!HTMLInputElement} */(
        document.getElementById('title'));
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            console.log("Autocomplete's returned place contains no geometry");
            return;
        }
        console.log(place);
        var photos = [];
        if (typeof place.photos !== "undefined") {
            for(var i=0;i<place.photos.length;i++){
                photos.push(place.photos[i].getUrl({ 'maxWidth': 1024, 'maxHeight': 768 }));
            }
        }

        var place_data = {
            name: place.name,
            place_id: place.place_id,
            address: place.formatted_address,
            location: {
                latitude: place.geometry.location.lat(),
                longitude: place.geometry.location.lng()
            },
            types: place.types,
            photos: photos
        };
        console.log(place_data);
    });
});