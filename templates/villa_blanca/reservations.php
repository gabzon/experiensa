<section id="villa_blanca_reservations" class="ui segment vertical custom-section" style="height:100vh;">
    <div class="section-content">
        <br>
        <br>
        <br>
        <h1 class="text-center" style="color: #FFFFFF;">Reservation</h1>
        <br>
        <div class="ui two column stackable grid">
            <div class="five wide centered column">
                <div id="reservation_datepicker" class="villa-blanca" style="padding-left: 50px !important;"></div>
                <br>
                <div style="padding-left: 70px;">
                    <button class="compact ui button" style="background-color: #fff; color: #000"><?= __('Available','sage');?></button>
                    <button class="compact ui button" style="background-color: #e61a8d; color: #fff"><?= __('Occupied','sage');?></button>
                </div>
            </div>
            <div class="five wide centered column">
                <?php get_template_part('templates/components/reservation','form'); ?>
                <br><br>
                <div id="reservationFeedback" style="display: none;"></div>
                <br><br>
            </div>
        </div>
        <br>
    </div>
</section>