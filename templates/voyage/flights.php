<?php
$airline        = get_post_meta($post->ID,'flight_airline');
$flight_number  = get_post_meta($post->ID,'flight_number');
$flight_class   = get_post_meta($post->ID,'flight_class');
$departure_city = get_post_meta($post->ID,'flight_departure_city');
$departure_date = get_post_meta($post->ID,'flight_departure_date');
$departure_time = get_post_meta($post->ID,'flight_departure_time');
$arrival_city   = get_post_meta($post->ID,'flight_arrival_city');
$arrival_date   = get_post_meta($post->ID,'flight_arrival_date');
$arrival_time   = get_post_meta($post->ID,'flight_arrival_time');
?>

<?php if ($airline): ?>
    <br>
    <hr>
    <br>
    <div class="ui segment basic" id="flight">
        <div class="ui grid stackable">
            <div class="one wide column">
                <button class="ui circular facebook icon button huge">
                    <i class="plane icon"></i>
                </button>
            </div>
            <div class="four wide column">
                <h2>Flights</h2>
            </div>
            <div class="eleven wide column">
                <table class="ui table fluid">
                    <?php for ($i = 0; $i < count($departure_city); $i++) : ?>
                        <tr>
                            <td width="15%">
                                <strong style="text-transform:uppercase"><?= $departure_city[$i]; ?></strong><br>
                                <?= $departure_date[$i]. '<br>'.$departure_time[$i];?>
                            </td>
                            <td width="70%" style="text-align:center">
                                <?= $airline[$i] . ' ' . $flight_number[$i];  ?>
                                <hr>
                            </td>
                            <td width="2%">
                                <br>
                                <i class="plane icon big"></i>
                            </td>
                            <td width="13%">
                                <strong style="text-transform:uppercase"><?= $arrival_city[$i]; ?></strong><br>
                                <?= $arrival_date[$i] . '<br>' . $arrival_time[$i];  ?>
                            </td>
                        </tr>
                    <?php endfor ?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
