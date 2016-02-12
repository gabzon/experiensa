
<?php $voyages = array(); ?>
<?php $voyages = Catalog::get_catalog(); ?>
<br>
<div class="ui four column grid stackable">
    <?php foreach ($voyages as $key => $value): ?>
        <div class="column">
            <div class="ui card">
                <?php if ($value['cover_image']): ?>
                    <div class="image">
                        <div class="ui blue ribbon label">
                            <?= convertCurrency($value['voyage_price'], $value['voyage_currency'], Helpers::get_currency() ) . ' ' . Helpers::get_currency(); ?>
                        </div>
                        <img src="<?= $value['cover_image']; ?>" alt="" />
                    </div>
                <?php endif; ?>
                <div class="content">
                    <div class="right floated">
                        <?php if ($value['voyage_price']): ?>
                            <?= convertCurrency($value['voyage_price'], $value['voyage_currency'], Helpers::get_currency() ) . ' ' . Helpers::get_currency(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="header">
                        <?php echo $value['title']; ?>
                    </div>
                    <div class="meta">
                    </div>
                </div><!-- .content -->
                <div class="extra content">
                    <?php echo $value['excerpt']; ?>
                    <br>
                    <?php $mailto = 'mailto:' . Helpers::get_email() . '?subject= Offre '.$value['title']; ?>
                    <a href="<?= $mailto; ?>" class="ui button"><?php _e('Contact us','sage'); ?></a>
                    <div class="right floated">
                        <button id="modal-details" class="ui button" type="submit" name="select"><?php _e('Details','sage'); ?></button>
                    </div>
                </div><!-- .extra.content -->
            </div><!-- .ui.card -->

            <!-- Modal Window for detail -->
            <?php Catalog::display_trip_detail($value); ?>
        </div><!-- .column -->

    <?php endforeach; ?>
</div>
