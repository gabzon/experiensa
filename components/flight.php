<?php

/**
 * Class Flights
 *  Class to display flights on estimate section
 */
class Flights{
    public static function display_flights( $flights ){
        $display = '';
        if(!empty($flights)){
            foreach ($flights as $flight){
                if(isset($flight['flight_airline']) && !empty($flight['flight_airline'])){
                    $display .= "<div class=\"content\"><br>";
                    $display .=     "<strong>".__('Flight','sage')."</strong><br><br>";
                    if(!empty($flight['flight_number'])):
                        $display .= "<div class=\"meta right floated\">";
                        $display .=     "#".$flight['flight_number']."<br>";
                        $display .= "</div>";
                    endif;
                    $display .=     "<strong>".__('Airline','sage').": </strong>".$flight['flight_airline'] . '<br>';
                    $display .=     "<strong>".__('Class','sage').": </strong>".$flight['flight_class'] . '<br>';
                    if($flight['flight_arrival_city']):
                        $display .= "<div class=\"meta right floated\">";
                        $display .=     "<strong>".__('Arrival','sage')."</strong><br>";
                        $display .=     $flight['flight_arrival_city']."<br>";
                        $display .=     $flight['flight_arrival_date'] . '<br>';
                        $display .=     $flight['flight_arrival_time'];
                        $display .= "</div>";
                    endif;
                    if($flight['flight_departure_city']):
                        $display .= "<div class=\"meta\">";
                        $display .=     "<strong>".__('Departure','sage')."</strong><br>";
                        $display .=     $flight['flight_departure_city']."<br>";
                        $display .=     $flight['flight_departure_date'] . '<br>';
                        $display .=     $flight['flight_departure_time'];
                        $display .= "</div>";
                    endif;
                    $display .= "</div>";
                }
            }
        }
        echo $display;
    }
}
