<!-- Google Map -->
<div class="column">
    <iframe
        width="600"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=<?= Helpers::getGoogleMapsAPIKey();?>&q=place_id:<?= $place_id;?>" allowfullscreen>
    </iframe>
</div>