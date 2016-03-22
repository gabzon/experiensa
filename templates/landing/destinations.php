<?php
$design_options = get_option('experiensa_design_settings');
$display_country_images = $design_options['setting_display_country_images'];
$color = $section['destination_color_group'][0];
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
<section id="promotion" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
  <br>
  <br>
  <div class="ui container">
      <h1><?php _e('Destinations'); ?></h1><br>
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
          $countries[] = $country;
?>
          
<?php
      endwhile;
      Carousel::display_carousel($countries);
    else:
?>
show only names
<?php
    endif;
?>
  </div>
  <br>
  <br>
  <br>
</section>
