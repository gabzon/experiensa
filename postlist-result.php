<?php
/**
 * Template Name: Search Posts By Category
 */
if (get_query_var('term') && get_query_var('tax')):
    if(get_query_var('cpt')){
        $posttype = $cpt;
    }else{
        $posttype = 'voyage';
    }
    $args = array (
        'posts_per_page' => 1,
        'post_type'      => array($posttype),
        'post_status'    => array('publish', 'inherit'),
        'tax_query'      => array(
            array(
                'taxonomy' => $tax,
                'field'    => 'slug',
                'terms'    => $term
            )
        )
    );
?>
    <section id="search-posts-section" class="ui basic orange inverted vertical segment center aligned">
    <br><br>
    <div class="ui container">
        <h1 class="ui center aligned huge header">
            <div class="content">
                Voyages
                <div class="sub header"></div>
            </div>
        </h1>
        <div id="search-results" class="search-results">
        <?php
            $query = new WP_Query($args);
            if($query->have_posts()):
                while ( $query->have_posts() ) :
                    $query->the_post();
                    $id = $query->post->ID;
                    echo "Encontrado:".$id;
                endwhile;
        ?>

        <?php else:?>
                <h3> <?=__('Sorry! Currently there are no voyages','sage');?></h3>
        </div>
    </div>
</section>
<?php
    endif;
endif;
