<script type="text/javascript">
    jQuery(function() {
        jQuery("#references_carousel").owlCarousel({
            autoPlay: true, //Set AutoPlay to 3 seconds
            autoplayTimeout:3000,
            loop:true,
            items: 1,
            nav:true,
            navText: [
                "<i class='chevron circle left icon'></i>",
                "<i class='chevron circle right icon'></i>"
            ],
        });
    });
</script>
<div class="ui inverted segment vertical" style="background:url(<?= get_stylesheet_directory_uri() . '/assets/images/comedor.jpg'; ?>) no-repeat center center fixed; background-size: cover; height:100vh;">
    <br>
    <br>
    <br>
    <h1 class="text-center"><?= __('References','sage');?></h1>
    <br>
    <div id="references_carousel" class="owl-carousel owl-theme">
        <div class="item">
            <div class="ui two column centered grid">
                <div class="row">
                    <div class="column">
                        <div class="ui pointing below basic label" style="padding: 1em;">
                            <p>
                                <em>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum. Donec arcu augue, semper sit amet imperdiet eget, facilisis eget quam. Nunc at purus id est ultrices aliquam. Aenean iaculis fringilla efficitur. Etiam vulputate tempus nunc, at consectetur lorem pharetra sit amet.
                                </em>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="four column centered row">
                    <div class="right aligned column">
                        <div class="ui tiny circular image">
                            <img src="http://semantic-ui.com/images/wireframe/image.png">
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <div class="header"><strong>Víctor Valencia</strong></div>
                            <div class="meta">
                                <span>Web Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <div class="item">
            <div class="ui two column centered grid">
                <div class="row">
                    <div class="column">
                        <div class="ui pointing below basic label" style="padding: 1em;">
                            <p>
                                <em>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum. Donec arcu augue, semper sit amet imperdiet eget, facilisis eget quam. Nunc at purus id est ultrices aliquam. Aenean iaculis fringilla efficitur. Etiam vulputate tempus nunc, at consectetur lorem pharetra sit amet.
                                </em>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="four column centered row">
                    <div class="right aligned column">
                        <div class="ui tiny circular image">
                            <img src="http://semantic-ui.com/images/wireframe/image.png">
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <div class="header"><strong>Tstiana Valencia</strong></div>
                            <div class="meta">
                                <span>Web Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ui two column centered grid">
                <div class="row">
                    <div class="column">
                        <div class="ui pointing below basic label" style="padding: 1em;">
                            <p>
                                <em>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum. Donec arcu augue, semper sit amet imperdiet eget, facilisis eget quam. Nunc at purus id est ultrices aliquam. Aenean iaculis fringilla efficitur. Etiam vulputate tempus nunc, at consectetur lorem pharetra sit amet.
                                </em>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="four column centered row">
                    <div class="right aligned column">
                        <div class="ui tiny circular image">
                            <img src="http://semantic-ui.com/images/wireframe/image.png">
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <div class="header"><strong>Karla Valencia</strong></div>
                            <div class="meta">
                                <span>Web Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>