<?php
$included     = wp_get_post_terms(get_the_ID(), 'included', array("fields" => "all"));
$excluded     = wp_get_post_terms(get_the_ID(), 'excluded', array("fields" => "all"));
$voyage_conditions = get_post_meta(get_the_ID(), 'voyage_conditions');
$voyage_info = get_post_meta(get_the_ID(), 'voyage_information_conditions', true);
?>
<?php if ($voyage_info): ?>
    <br>
    <hr>
    <br>
    <?php if ($voyage_conditions): ?>
        <div class="ui two column grid stackable">
            <?php foreach ($voyage_conditions as $key => $value): ?>
                <div class="column">
                    <?php if ($value === 'refundable'): ?>
                        <div class="ui green message">
                            <?php _e('* This offer is refundable, please look our refund conditions') ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($value === 'flexible'): ?>
                        <div class="ui green message">
                            <?php _e('* This offer is flexible, please look our flexibility conditions') ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <h3><?php _e('Information & Conditions','sage'); ?></h3>
    <?= $voyage_info; ?>
    <br><br>
<?php endif; ?>

<?php if ($included || $excluded): ?>
    <hr>
    <br>
    <div class="ui two column grid stackable">
        <div class="column">
            <h3><?php _e('Included','sage') ?></h3>
            <?php if ($included): ?>
                <ul>
                    <?php foreach ($included as $key): ?>
                        <li><strong><?= $key->name; ?></strong> <?= $key->description; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="column">
            <h3><?php _e('Not included','sage') ?></h3>
            <?php if ($excluded): ?>
                <ul>
                    <?php foreach ($excluded as $key): ?>
                        <li><strong><?= $key->name; ?></strong> <?= $key->description; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
