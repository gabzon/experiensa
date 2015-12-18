<div id="preview" class="ui container">
    <div class="ui grid stackable">
        <div class="mobile only row">
            <div class="sixteen wide column">
                <?php get_template_part('templates/product/preview-table'); ?>
            </div>
        </div>
        <div class="tablet only row">
            <div class="ui grid">
                <div class="ten wide column">
                    <div class="font-white">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <div class="six wide column">
                    <?php get_template_part('templates/product/preview-table'); ?>
                </div>
            </div>
        </div>
        <div class="computer only row">
            <div class="ui grid">
                <div class="ten wide column">
                    <div class="font-white">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <div class="one wide column"></div>
                <div class="five wide column">
                    <?php get_template_part('templates/product/preview-table'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
