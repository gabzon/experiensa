function getWikiText(){
    var wiki_content = jQuery('.wiki-content');
    if(wiki_content.length > 0){
        var infobox = wiki_content.find('.infobox');
        // console.log(infobox.html());
        var first_text = infobox.next();
        // console.log(first_text.html());
        wiki_content.html(first_text.html());
    }
}