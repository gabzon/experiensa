<?php
$agency_settings = get_option('agency_settings');
$display_partners = (isset($agency_settings['setting_partners_display'])?$agency_settings['setting_partners_display']:'FALSE');
$partners = (isset($agency_settings['agency_partners'])?$agency_settings['agency_partners']:array());
if($display_partners == 'TRUE' && !empty($partners) && !empty($partners[0]['partner_name'])):?>
<section id="promotion" class="ui basic vertical segment center aligned">
    <br><br>
    <div class="ui container">
        <h1><?php _e('Our Partners','sage'); ?></h1><br>
    </div>
    <?php
    foreach ($partners as $partner){
        $info['title'] = $partner['partner_name'];
        $info['subtitle'] = '';
        $info['post_link'] = (!empty($partner['partner_website'])?$partner['partner_website']:'#');
        $info['image_url'] = wp_get_attachment_url($partner['partner_logo'][0]);
        $info['thumbnail_url'] = (!empty($partner['partner_logo'][0])?wp_get_attachment_thumb_url($partner['partner_logo'][0]):'');
        $info['show_thumbnail'] = true;
        $partner_list[] = $info;
    }
    Grid::display_grid($partner_list);
    ?>
</section>
<?php endif;?>
