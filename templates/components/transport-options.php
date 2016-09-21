<div id="transport-options" ng-show="transport">
    <br>
    <div class="ui fluid input field">
        <label for="transport-type"><?php _e('Type of transportation','sage'); ?></label>
        <select name="transport-type" class="ui dropdown">
            <option value=""><?php _e('Type of transport','sage'); ?></option>
            <option value="rent a car"><?php _e('Rent a Car','sage'); ?></option>
<!--            <option value="private">--><?php //_e('Private','sage'); ?><!--</option>-->
<!--            <option value="semi-private">--><?php //_e('Semi private','sage'); ?><!--</option>-->
            <option value="public transportation"><?php _e('Public Transportation','sage'); ?></option>
        </select>
    </div>
    <div class="ui fluid input field" ng-hide="companion">
        <select name="driver" id="driver" class="ui dropdown">
            <option value=""><?php _e('Driver','sage'); ?></option>
            <option value="self-drive"><?php _e('Self Drive','sage'); ?></option>
            <option value="driver"><?php _e('Driver','sage'); ?></option>
        </select>
    </div>
</div>
