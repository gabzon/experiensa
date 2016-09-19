<script type="text/javascript">
    jQuery(function() {
        jQuery('.voyage-slider').vegas({
            overlay: '<?= $overlay;?>',
            slides: [
                <?php foreach($data as $img):?>
                { src: '<?=$img;?>' },
                <?php endforeach;?>
            ]
        });
    });
</script>
<section id="<?= $id;?>" class="voyage-slider main-slider" style="height:100vh;">
    <div class="ui container">
        <br><br>
        <div id="preview" class="ui container">
            <div class="ui grid stackable">
                <div class="mobile only row">
                    <div class="sixteen wide column">
<!--                        <h1 class="font-white"></h1>-->
                        <p class="font-white"><?=$message;?></p>
                    </div>
                </div>
                <div class="tablet only row">
                    <div class="ui grid">
                        <div class="ten wide column">
                            <h1 class="font-white"></h1>
                            <p class="font-white">"<?=$message;?></p>
                        </div>
                    </div>
                </div>
                <div class="computer only row">
                    <div class="ui grid">
                        <div class="ten wide column">
                            <div>
                                <h1 class="font-white"><?=$message;?></h1>
                            </div>
                        </div>
                        <div class="one wide column"></div>
                        <div class="five wide column"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>