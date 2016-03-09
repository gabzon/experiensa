<div class="fields">
    <div class="seven wide field">
        <div class="ui fluid input field">
            <div class="ui left icon input">
                <input name="destination" id="destination" type="text" placeholder="<?php _e('Destination','sage'); ?>" />
                <i class="marker icon"></i>
            </div>
        </div>
    </div>
    <div class="three wide field">
        <div class="ui fluid input icon field">
            <i class="calendar icon"></i>
            <input name="departure" id="departure" type="text" class="datepicker" placeholder="<?php _e('Departure date','sage'); ?>">
        </div>
    </div>
    <div class="three wide field">
        <div class="ui fluid input icon field">
            <input name="return" id="return" type="text" class="datepicker" placeholder="<?php _e('Return date','sage'); ?>">
            <i class="calendar icon"></i>
        </div>
    </div>
    <div class="three wide field">
        <div class="ui fluid input field">
            <select name="flexibility" id="flexibility" class="ui dropdown">
                <option value=""><?php _e('Flexibility','sage'); ?></option>
                <option value="exact"><?php _e('Exact dates','sage'); ?></option>
                <option value="3-days"><?php _e('+/- 3 days','sage'); ?></option>
                <option value="1-week"><?php _e('+/- 1 week','sage'); ?></option>
                <option value="2-weeks"><?php _e('+/- 2 weeks','sage'); ?></option>
                <option value="1 month"><?php _e('+/- 1 month','sage'); ?></option>
                <option value="whenever"><?php _e('Whenever','sage'); ?></option>
            </select>
        </div>
    </div>
</div>
