<?php
$flight_options = get_post_meta($post->ID,'flight_options',true);

?>
<?php if (isset($flight_options[0]) && !empty($flight_options[0]) && !empty($flight_options[0]['flight_airline'])): ?>
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
                <?php foreach($flight_options as $option):?>
                <?php if(!empty($option['flight_airline']) && !empty($option['flight_departure_city'])):?>
                  <tr>
                    <td width="15%">
                      <strong style="text-transform:uppercase"><?= $option['flight_departure_city']; ?></strong><br>
                      <?= $option['flight_departure_date']. '<br>'.$option['flight_departure_time'];?>
                    </td>
                    <td width="70%" style="text-align:center">
                      <?= $option['flight_airline'] . ' ' . $option['flight_arrival_time'];  ?>
                      <hr>
                    </td>
                    <td width="2%">
                        <br>
                        <i class="plane icon big"></i>
                    </td>
                    <td width="13%">
                      <strong style="text-transform:uppercase"><?= $option['flight_arrival_city']; ?></strong><br>
                      <?= $option['flight_arrival_date'] . '<br>' . $option['flight_airline'];  ?>
                    </td>
                  </tr>
                <?php endif;?>
                <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
