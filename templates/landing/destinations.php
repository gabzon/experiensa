<?php
$design_options = get_option('experiensa_design_settings');
$asd = get_option('agency_settings');
//print_r($asd);
$display_country_images = $design_options['setting_display_country_images'];
$section = $design_options['destination_color_group'];
$color = $section['destination_section_color'][0];
$inverted = $section['destination_section_inverted'][0];
$terms = get_terms('country', 'orderby=none&hide_empty');
$args = array (
    'posts_per_page' => -1,
    'post_type'     => array( 'attachment' ),
    'post_status'   => array( 'publish', 'inherit' ),
    'tax_query' => array(
        array(
            'taxonomy' => 'country',
            'field' => 'slug',
            'terms' => wp_list_pluck($terms,'slug')
        )
      )
);
$query = new WP_Query($args);
$terms = "";
?>

<?php if ($design_options['display_destinations'] == 'TRUE'): ?>


    <section id="destinations" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
      <br>
      <br>
      <div class="ui container">
          <h1><?php _e('Destinations','sage'); ?></h1><br>
    <?php
          if($display_country_images == 'TRUE' && $query->have_posts()):
            while ( $query->have_posts() ) :
              $query->the_post();
              $description = $query->post_content;
              $terms = get_the_terms($post->ID,'country');
              $term = $terms[0];
              $title = $term->name;
              $subtitle = get_post_field('post_content', $post->ID);
              $country['title']=$title;
              $country['subtitle'] = $subtitle;
              $country['post_link'] = get_permalink();
              $country['image_url'] = $post->guid;
              $country['thumbnail_image'] = wp_get_attachment_image($post->ID,'thumbnail');
              $countries[] = $country;
    ?>

    <?php
          endwhile;
          //Grid::display_grid($countries);
          //Carousel::display_carousel($countries);
          Masonry::display_masonry($countries);
        else:
          $terms = get_terms('country', 'orderby=none&hide_empty');
          $args = array (
            'posts_per_page' => -1,
            'post_type'     => array( 'attachment' ),
            'post_status'   => array( 'publish', 'inherit' ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'country',
                    'field' => 'slug',
                    'terms' => wp_list_pluck($terms,'slug')
                )
              )
          );
          $query = new WP_Query($args);
          //echo $query->request;
          if($query->have_posts()):
            while ( $query->have_posts() ) :
               $query->the_post();
              $description = $query->post_content;
              $terms = get_the_terms($post->ID,'country');
              $term = $terms[0];
              $title = $term->name;
              $subtitle = get_post_field('post_content', $post->ID);
              $country['title']=$title;
              $country['subtitle'] = $subtitle;
              $country['post_link'] = get_permalink();
              $country['image_url'] = $post->guid;
              $country['thumbnail_image'] = wp_get_attachment_image($post->ID,'thumbnail');
              $countries[] = $country;
            endwhile;
            Carousel::display_casousel_text($countries);
          else:?>
            <h3><?php _e('Sorry! Currently there are no destinations','sage'); ?></h3>
          <?php
          endif;
        endif;
    ?>
      </div>
      <br>
      <br>
      <br>
    </section>

<?php endif; ?>
