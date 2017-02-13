<?php

//echo "<h1>Voy por yahoo weather</h1>";
//$datos = \Experiensa\Modules\Weather::yahoo_request($address,$latitude,$longitude);
//echo "<pre>";
//var_dump($datos);
//echo "</pre>";
//echo "<h1>Voy por wunderground_forecast_request</h1>";
$weather = \Experiensa\Modules\Weather::wunderground_forecast_request(false,$latitude,$longitude);
$forecast = $weather->forecast->simpleforecast->forecastday;
?>
<br/>
<br/>
<div class="sixteen wide column">
    <div class="ui big horizontal divided selection list">
        <?php foreach ($forecast as $data):?>
        <div class="item">
            <img class="ui image" src="<?= $data->icon_url?>">
            <div class="content" style="text-align: right;">
                <div class="header"><?= $data->conditions;?></div>
                <?=$data->low->celsius.' C° '.__('Low','sage');?>
                <p>
                    <i class="theme icon" style="color: #8ed1e9"></i><?=$data->avehumidity.'%';?><br/>
                    <i class="leaf icon" style="color: #B9D194"></i><?=$data->avewind->kph.' Km/h';?>
                </p>
            </div>
            <div class="ui statistics" style="margin: 0 auto;">
                <div class="ui statistic">
                    <div class="value">
                        <?= $data->high->celsius.' C°';?>
                    </div>
                    <div class="label">
                        <?= __('High','sage');?>
                    </div>
                </div>
            </div>
            <div style="text-align: center">
                <?= $data->date->day.'/'.$data->date->month.'/'.$data->date->year?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
