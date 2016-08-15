<?php
/**
* Template Name: Portfolio
*/

$args = array( 'post_type' => 'project' , 'numberposts'=> -1 );
$products = get_posts( $args_project );

?>

<section id="portfolio" class="ui page grid">
    <div class="column">
        <h2><?php _e('Portfolio','sage') ?></h2>

        <div id="isotope-filters" class="button-group">
            <?php $tags = get_tags(); ?>
            <button class="ui button" data-filter="*"><?php _e('All','sage'); ?></button>
            <?php foreach ( $tags as $tag ): ?>
                <button class="ui button" data-filter="<?php echo ".".$tag->slug; ?>">
                    <?php echo $tag->name; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="ui divider"></div>

        <div class="isotope-container">
            <?php foreach ( $products as $post ) : setup_postdata( $post ); ?>
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="ui card isotope-item <?php print_tags($post->ID); ?>" data-category="<?php print_tags($post->ID); ?>">

                        <div class="ui image">
                            <a href="<?php echo get_post_meta($post->ID,'project_website',true) ?>" target="_blank">
                                <img src="<?php echo $image[0]; ?>"/>
                            </a>
                        </div>
                        <div class="content">
                            <h4><?php the_title(); ?></h4>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
            <?php wp_reset_postdata();?>
        </div>
    </div>
</section>
