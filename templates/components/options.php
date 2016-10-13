<div class="fields">
    <div class="three wide field">
        <div class="ui fluid input field">
            <select name="companion" id="companion" class="ui dropdown">
                <option value=""><?php _e('Traveling with','sage'); ?></option>
                <option value="alone"><?php _e('Alone','sage'); ?></option>
                <option value="couple"><?php _e('In couple','sage'); ?></option>
                <option value="family"><?php _e('Family','sage'); ?></option>
                <option value="friends"><?php _e('Friends','sage'); ?></option>
                <option value="group"><?php _e('Group','sage'); ?></option>
                <option value="colleagues"><?php _e('Collegues','sage'); ?></option>
            </select>
        </div>
    </div>
    <div class="three wide field">
        <div class="ui fluid input field">
            <select name="adults" id="adults" class="ui dropdown">
                <option value=""><?php _e('Adults','sage'); ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="more"><?php _e('More','sage'); ?></option>
            </select>
        </div>
    </div>
    <div class="three wide field">
        <div class="ui fluid input field" ng-hide="companion">
            <select name="kids" id="kids" class="ui dropdown">
                <option value=""><?= __('Kids','sage').' (2-11 '.__('years').')'; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="< 12 years"><?php _e('< 12 year old','sage'); ?></option>
                <option value="more"><?php _e('More','sage'); ?></option>
            </select>
        </div>
    </div>
    <div class="three wide field">
        <div class="ui fluid input field">
            <select name="babies" id="babies" class="ui dropdown">
                <option value=""><?= __('Babies','sage').' (0-1 '.__('years').')'; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="more"><?php _e('More','sage'); ?></option>
            </select>
        </div>
    </div>
    <div class="four wide field">
        <strong><?php _e('Budget','sage'); ?></strong>
        <div class="budget-slider">
            <div id="price-slider"></div>
            <input type="hidden" name="budget" id="budget">
        </div>
        <br>
    </div>
</div>
