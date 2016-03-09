<div id="hosting-options" ng-show="hosting">
    <br>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="internet"/> &nbsp;&nbsp;<?php _e('Internet','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="breakfast"/> &nbsp;&nbsp;<?php _e('Breakfast','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="parking"/> &nbsp;&nbsp;<?php _e('Parking','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="swiming"/> &nbsp;&nbsp;<?php _e('Swiming Pool','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="laundry"/> &nbsp;&nbsp;<?php _e('Laundry Room','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="fitness"/> &nbsp;&nbsp;<?php _e('Gym/Fitness','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="Space wellbeing"/> &nbsp;&nbsp;<?php _e('Space Well-being','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-options[]" type="checkbox" value="Conference room"/> &nbsp;&nbsp;<?php _e('Conference room','sage'); ?>
    </div>

    <div class="ui basic fluid large label colorless">
        <input name="host-type[]" value="hotel" type="checkbox" ng-model="hotel"/> &nbsp;&nbsp;<?php _e('Hotel','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-type[]" value="appartment" type="checkbox"/> &nbsp;&nbsp;<?php _e('House/Appartment','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-type[]" value="camping" type="checkbox"/> &nbsp;&nbsp;<?php _e('Homestay','sage'); ?>
    </div>
    <div class="ui basic fluid large label colorless">
        <input name="host-type[]" value="homestay" type="checkbox"/> &nbsp;&nbsp;<?php _e('Camping','sage'); ?>
    </div>
    <div ng-show="hotel">
        <div class="ui basic fluid large label colorless">
            <input name="hotel[]" value="5-star" type="checkbox"/> &nbsp;&nbsp;<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
        </div>
        <div class="ui basic fluid large label colorless">
            <input name="hotel[]" value="4-star" type="checkbox"/> &nbsp;&nbsp;<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
        </div>
        <div class="ui basic fluid large label colorless">
            <input name="hotel[]" value="3-star" type="checkbox"/> &nbsp;&nbsp;<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
        </div>
        <div class="ui basic fluid large label colorless">
            <input name="hotel[]" value="2-star" type="checkbox"/> &nbsp;&nbsp;<i class="star icon"></i><i class="star icon"></i>
        </div>
    </div>
</div>
