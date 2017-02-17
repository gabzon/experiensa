function getSiteLanguage(callback){
    jQuery.ajax({
        type:"POST",
        url: sage_vars.ajaxurl,
        data:{
            'action': 'requestLanguage'
        },
        async: false,
        success:function(response){
            callback(response.language);
        },
        error: function(request, error) {
            console.log("Request: " + JSON.stringify(request));
            console.log("Error: " + JSON.stringify(error));
        }
    });
}
/*function createWikiObject(labels,texts,links){
    var response = [];
    var len = labels.length;
    for (var i = 0; i < len; i++) {
        item = {
            item: {
                label: labels[i],
                value: labels[i],
                text: texts[i],
                link: links[i]
            }
        };
        response.push(item);
    }
    return response;
}*/
jQuery(document).ready(function ($) {
    // $("#title-prompt-text").html('');
    var input = /** @type {!HTMLInputElement} */(
        document.getElementsByClassName('search-google-place')[0]);
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
        var phone_number = '';
        if(typeof place.international_phone_number !== "undefined") {
            phone_number = place.international_phone_number;
        }
        var vicinity = '';
        if(typeof place.vicinity !== "undefined") {
            vicinity = place.vicinity;
        }
        var rating = '';
        if(typeof place.rating !== "undefined") {
            rating = place.rating;
        }
        var utc_offset = '';
        if(typeof place.utc_offset !== "undefined") {
            utc_offset = place.utc_offset;
        }
        var website = '';
        if(typeof place.website !== "undefined") {
            website = place.website;
        }
        var reviews = [];
        if(typeof place.reviews !== "undefined") {
            reviews = place.reviews;
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
            photos: photos,
            map_url: place.url,
            phone_number: phone_number,
            vicinity: vicinity,
            rating: rating,
            utc_offset: utc_offset,
            website: website,
            reviews: reviews
        };
        console.log(place_data);
        var place_string = JSON.stringify(place_data);
        // $('#_post_meta_place_api_data_0').val(place_string);
        var place_input = $('input[name="_post_meta[place_api_data]"]:hidden');
        place_input.val(place_string);
    });
    var language = 'en';
    getSiteLanguage(function(response){
        language = response;
    });
    var wikiApiURL = 'http://'+language+'.wikipedia.org/w/api.php';

    $(".search-wiki-article").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: wikiApiURL,
                dataType: "jsonp",
                data: {
                    'action': "opensearch",
                    'format': "json",
                    'search': request.term
                },
                success: function(data) {
                    response(data[1]);
                    // console.log(data);
                }
            });
        },
        focus: function( e, ui ) {
            $( ".search-wiki-article" ).val( ui.item.label );
            return false;
        },
        select: function(e, ui){
            // console.log('se ha seleccionado');
            console.log(ui);
            return false;
        }
    });
});