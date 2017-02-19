function getWikiText(){
    var wiki_content = jQuery('.wiki-content');
    if(wiki_content.length > 0){
        var first_text = wiki_content.children('p:eq(1)');
        wiki_content.html(first_text.text());
        wiki_content.show();
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