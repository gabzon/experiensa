<!-- Fligth information -->
<div id="flight-options" ng-show="flight">
    <br>    
    <div class="fields">
        <div class="field">
            <strong><?php _e('Class','sage'); ?></strong>
            <div class="ui divider"></div>
            <div class="ui basic fluid large label colorless">
                <input name="class[]" type="checkbox" value="economy" checked="checked"/> &nbsp;&nbsp;<?php _e('Economy','sage'); ?>
            </div>
            <div class="ui basic fluid large label colorless">
                <input name="class[]" type="checkbox" value="business"/> &nbsp;&nbsp;<?php _e('Business Class','sage'); ?>
            </div>
            <div class="ui basic fluid large label colorless">
                <input name="class[]" type="checkbox" name="first"/> &nbsp;&nbsp;<?php _e('First Class','sage'); ?>
            </div>
        </div>
        <div class="field">
            <strong><?php _e('Seat','place'); ?></strong>
            <div class="ui divider"></div>
            <div class="ui basic fluid large label colorless">
                <input name="seat" type="radio" value="either" checked="checked"/> &nbsp;&nbsp;<?php _e('Either','sage'); ?>
            </div>
            <div class="ui basic fluid large label colorless">
                <input name="seat" type="radio" value="aisle"/> &nbsp;&nbsp;<?php _e('Aisle','sage'); ?>
            </div>
            <div class="ui basic fluid large label colorless">
                <input name="seat" type="radio" value="windows"/> &nbsp;&nbsp;<?php _e('Windows','sage'); ?>
            </div>
        </div>
        <div class="field">
            <strong><?php _e('Preferences','place'); ?></strong>
            <div class="ui divider"></div>
            <div class="ui basic fluid large label colorless">
                <input name="flight-options[]" type="checkbox" value="vegetarian-meal"/> &nbsp;&nbsp;<?php _e('Vegeterian meal','sage'); ?>
            </div>
            <div class="ui basic fluid large label colorless">
                <input name="flight-options[]" type="checkbox" value="special-assistance"/> &nbsp;&nbsp;<?php _e('Special assistance','sage'); ?>
            </div>
        </div>
    </div>
    <br>
</div>
