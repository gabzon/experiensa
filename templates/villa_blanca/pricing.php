<section id="villa_blanca_pricing" class="ui inverted segment vertical" style="background:url(<?= get_stylesheet_directory_uri() . '/assets/images/comedor.jpg'; ?>) no-repeat center center fixed; background-size: cover; height:100vh;">
    <br>
    <br>
    <br>
    <h1 class="text-center"><?= __('Pricing','sage');?></h1>
    <br>
    <div class="ui grid centered">
    <?php
        get_template_part('templates/villa_blanca/high','season');
        get_template_part('templates/villa_blanca/low','season');
    ?>
    </div>
    <br>
</section>