<div class="ui inverted segment vertical" style="background:url(<?= get_stylesheet_directory_uri() . '/assets/images/living-room.jpg'; ?>) no-repeat center center fixed; background-size: cover; height:100vh;">
    <br>
    <br>
    <br>
    <h1 class="text-center"><?= __('Reservation','sage');?></h1>
    <br>
    <div class="ui grid centered">
      <div class="five wide column">
        <div id="reservation_datepicker" class="ll-skin-latoja"></div>
      </div>
      <div class="five wide column">
        <?php get_template_part('templates/components/reservation','form'); ?>
        <br/><br/>
        <div id="reservationFeedback" style="display: none;"></div>
        <br/><br/>
      </div>
    </div>
    <br>
</div>
