<?php
/**
* Template Name: Reservations
*/
use Experiensa\Modules\QueryBuilder;
use Experiensa\Modules\Post;

$query = QueryBuilder::getPostByPostType('post');
if(!isset($background)){
    $bg_url = get_stylesheet_directory_uri().'/assets/images/living-room.jpg';
    $background['style'] = "background:url('".$bg_url."') no-repeat center center fixed; background-size: cover; height:100vh;";
    $background['class'] = 'inverted';
    $background['type'] = 'none';
}
if(!isset($name)){
    $name = 'villa_blanca_reservations';
}
?>
<section id="villa_blanca_reservations" class="ui <?= $background['class'];?> segment vertical" style="<?=$background['style'];?>">
    <br>
    <br>
    <br>
    <h1 class="text-center" style="color: #FFFFFF;"><?= __('Reservation','sage');?></h1>
    <br>
    <div class="ui grid centered">
      <div class="five wide column">
        <div id="reservation_datepicker" class="villa-blanca"></div>
      </div>
      <div class="five wide column">
        <?php get_template_part('templates/components/reservation','form'); ?>
        <br/><br/>
        <div id="reservationFeedback" style="display: none;"></div>
        <br/><br/>
      </div>
    </div>
    <br>
</section>
