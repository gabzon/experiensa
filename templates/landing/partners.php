<?php
$agency_settings = get_option('agency_settings');
$partners = (isset($agency_settings['agency_partners'])?$agency_settings['agency_partners']:array());

$design_options = get_option('experiensa_design_settings');
$section = $design_options['promotion_color_group'];
$display_promotions = $design_options['display_promotions'];
$color = $section['promotion_section_color'][0];
$inverted = $section['promotion_section_inverted'][0];

$partner_name = $partners['partner_name'];
$partner_website = $partners['partner_website'];
$partner_logo = $partners['partner_logo'];

if(!empty($partners)):
?>
    <section id="promotion" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
        <br><br>
        <div class="ui container">
        <h1><?php _e('Our Partners','sage'); ?></h1><br>
        <?php
        for($i=0;$i<count($partner_name);$i++):
            $partner['title'] = $partner_name[$i];
            $partner['subtitle'] = '';
            $partner['post_link'] = (isset($partner_website[$i]) && !empty($partner_website[$i])?$partner_website[$i]:'#');
            $partner['image_url'] = wp_get_attachment_url($partner_logo[$i][0]);
            $partner['thumbnail_url'] = (isset($partner_logo[$i][0]) && !empty($partner_logo[$i][0])?wp_get_attachment_thumb_url($partner_logo[$i][0]):'');
            //$partner['thumbnail_image'] = (isset($partner_logo[$i][0]) && !empty($partner_logo[$i][0])?wp_get_attachment_image($partner_logo[$i][0],'thumbnail'):'');
        
            $partner_list[] = $partner;
        endfor;
        //Carousel::display_carousel($partner_list);
        Grid::display_grid($partner_list);
      ?>
    </div>
    </section>
<?php
endif;