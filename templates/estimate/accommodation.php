<?php
$accommodations = get_post_meta($post->ID, 'estimate_accommodation_group');
//Piklist::pre($accommodations);
//Accommodations

// 'estimate_establishment_name',
// 'estimate_establishment_type',
// 'estimate_establishment_rating',
// 'estimate_establishment_checkin_date',
// 'estimate_establishment_checkin_time',
// 'estimate_establishment_checkout_date',
// 'estimate_establishment_checkout_time',
// 'estimate_establishment_comments',
// 'estimate_establishment_gallery',
/*echo('<pre>');
print_r($accommodations);
echo('</pre>');*/
$accommodation = $accommodations[0];
if(isset($accommodation['estimate_establishment_rating'][$i]) && !empty($accommodation['estimate_establishment_rating'][$i]) ){
  echo "<div class=\"content\">";
?>
  <br>
  <?= "<strong>".__('Accommodation','sage')."</strong><br><br>"?>
  <div class="meta right floated">
      <?php echo $accommodation['estimate_establishment_rating'][$i] .' '.__('Stars','sage').'<br>'; ?>
  </div>
  <?php
  echo $accommodation['estimate_establishment_name'][$i] . '<br>';
  echo "<strong>".__('Type','sage').": </strong>".$accommodation['estimate_establishment_type'][$i] . '<br>';
  ?>
  <br>
  <div class="meta right floated">
    <strong><?php _e('Check-out','sage'); ?></strong><br>
    <?php
        echo $accommodation['estimate_establishment_checkout_date'][$i] . '<br>';
        echo $accommodation['estimate_establishment_checkout_time'][$i];
    ?>
  </div>
  <div class="meta">
      <strong><?php _e('Check-in','sage'); ?></strong><br>
      <?php
      echo $accommodation['estimate_establishment_checkin_date'][$i] . '<br>';
      echo $accommodation['estimate_establishment_checkin_time'][$i]
      ?>
  </div>
  <?php
  if(!empty($accommodation['estimate_establishment_gallery'][$i]) && $accommodation['estimate_establishment_gallery'][$i][0]!='undefined'):
  ?>
  <br>
  <div class="image">
    <?php Gallery::show_gallery($accommodation['estimate_establishment_gallery'][$i]); ?>
  </div>
  <?php
  endif;
  ?>
  <div class="content">
    <a class="header"></a>
    <div class="meta">
      <span class="date"><?= $accommodation['estimate_establishment_comments'][$i]; ?></span>
    </div>
  </div>
<?php
    echo"</div>";
}