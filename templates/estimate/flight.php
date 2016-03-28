<?php
$flights = get_post_meta($post->ID, 'estimate_flight_group');
//Piklist::pre($flights);
//Flight

// 'estimate_flight_airline',
// 'estimate_flight_number',
// 'estimate_flight_class',
// 'estimate_flight_departure_city',
// 'estimate_flight_arrival_city',
// 'estimate_flight_departure_date',
// 'estimate_flight_departure_time',
// 'estimate_flight_arrival_date',
// 'estimate_flight_arrival_time',
if(isset($flights[0]['estimate_flight_class'][$i]) && !empty($flights[0]['estimate_flight_class'][$i]) ){
  echo "<div class=\"content\">";
?>
  <br>
  <?= "<strong>".__('Flight','sage')."</strong><br><br>"?>
  <div class="meta right floated">
      <?php echo "#".$flights[0]['estimate_flight_number'][$i] . '<br>'; ?>
  </div>
  <?php
  echo "<strong>".__('Airline','sage').": </strong>".$flights[0]['estimate_flight_airline'][$i] . '<br>';
  echo "<strong>".__('Class','sage').": </strong>".$flights[0]['estimate_flight_class'][$i] . '<br>';
  ?>
  <br>
  <div class="meta right floated">
      <strong><?php _e('Arrival','sage'); ?></strong><br>
      <?php echo $flights[0]['estimate_flight_arrival_city'][$i]; ?><br>
      <?php
          echo $flights[0]['estimate_flight_arrival_date'][$i] . '<br>';
          echo $flights[0]['estimate_flight_arrival_time'][$i];
      ?>
  </div>
  <div class="meta">
      <strong><?php _e('Departure','sage'); ?></strong><br>
      <?php echo $flights[0]['estimate_flight_departure_city'][$i]; ?><br>
      <?php
      echo $flights[0]['estimate_flight_departure_date'][$i] . '<br>';
      echo $flights[0]['estimate_flight_departure_time'][$i]
      ?>
  </div>
<?php
  echo "</div>";
}
?>
