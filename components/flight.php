<?php

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

class Flights{
  public static function display_flights( $flights, $i){
    if(isset($flights['estimate_flight_airline'][$i]) && !empty($flights['estimate_flight_airline'][$i]) ){
        echo "<div class=\"content\">";
        ?>
        <br>
        <?= "<strong>".__('Flight','sage')."</strong><br><br>"?>
        <?php if($flights['estimate_flight_number'][$i]):?>
        <div class="meta right floated">
            <?php echo "#".$flights['estimate_flight_number'][$i] . '<br>'; ?>
        </div>
        <?php
        endif;
        echo "<strong>".__('Airline','sage').": </strong>".$flights['estimate_flight_airline'][$i] . '<br>';
        echo "<strong>".__('Class','sage').": </strong>".$flights['estimate_flight_class'][$i] . '<br>';
        ?>
        <br>
        <?php if($flights['estimate_flight_arrival_city'][$i]):?>
        <div class="meta right floated">
            <strong><?php _e('Arrival','sage'); ?></strong><br>
            <?php echo $flights['estimate_flight_arrival_city'][$i]; ?><br>
            <?php
            echo $flights['estimate_flight_arrival_date'][$i] . '<br>';
            echo $flights['estimate_flight_arrival_time'][$i];
            ?>
        </div>
        <?php endif;?>
        <?php if($flights['estimate_flight_departure_city'][$i]):?>
        <div class="meta">
            <strong><?php _e('Departure','sage'); ?></strong><br>
            <?php echo $flights['estimate_flight_departure_city'][$i]; ?><br>
            <?php
            echo $flights['estimate_flight_departure_date'][$i] . '<br>';
            echo $flights['estimate_flight_departure_time'][$i]
            ?>
        </div>
        <?php endif;?>
        <?php
        echo "</div>";
    }
  }
}
