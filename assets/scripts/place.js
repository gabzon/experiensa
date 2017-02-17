function getWikiText(){
    var wiki_content = jQuery('.wiki-content');
    if(wiki_content.length > 0){
        var infobox = wiki_content.find('.infobox');
        console.log(infobox.html());
        var first_text = infobox.next();
        console.log(first_text.html());
        // wiki_content.html(first_text.html());
    }
}
function getLanguage(callback){
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