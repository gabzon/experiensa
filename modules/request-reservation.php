<?php

function requestReservation(){
    $headers = array('Content-Type: text/html; charset=UTF-8');
    if(!isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        $error =   "<div class=\"ui negative message\">
                  <i class=\"close icon\"></i>
                  <div class=\"header\">
                    ".__("Error","sage")."
                  </div>
                  <p>".__("Error checking captcha verification or need to add reCAPTCHA keys.","sage")."</p>
                </div>";
        echo $error;
        die();
    }

    $fullname = $_POST['fullname'];
    $agency_email = $_POST['agency_email'];
    $email = $_POST['email'];
    $reservation_start = $_POST['reservation_start'];
    $reservation_end = $_POST['reservation_end'];
//    $checkin = $_POST['checkin'];
//    $checkout = $_POST['checkout'];
    $comments = (isset($_POST['comments'])?$_POST['comments']:"");
    
    $to = $agency_email.','.$email;
    $subject = "Reservation: ".$email;
    
    $body = "<strong>Fullname: </strong>".$fullname."<br>";
    $body .= "<strong>Email: </strong>".$email."<br>";
    $body .= "<strong>Start Date: </strong>".$reservation_start." <strong>End Date: </strong>".$reservation_end."<br>";
//    $body .= "<strong>Check-In: </strong>".$checkin."<br>";
//    $body .= "<strong>Check-Out: </strong>".$checkout."<br>";
    $body .= "<strong>Comments: </strong>".$comments."<br>";
    
    $success = "<div class=\"ui success message\">
                <i class=\"close icon\"></i>
                <div class=\"header\">
                  ".__("Success","sage").".
                </div>
                <p>".__("Your reservation has been sent","sage")."</p>
              </div>";
    $error =   "<div class=\"ui negative message\">
                  <i class=\"close icon\"></i>
                  <div class=\"header\">
                    ".__("Error","sage")."
                  </div>
                  <p>".__("Reservation could not be sent","sage")."</p>
                </div>";
    if( wp_mail( $to,$subject , $body, $headers) === FALSE){
      $msg = $error;
    }else{
      $msg = $success;
    }
    echo $msg;
    die();
}

add_action('wp_ajax_requestReservation', 'requestReservation');
add_action('wp_ajax_nopriv_requestReservation', 'requestReservation');
?>
