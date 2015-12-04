<?php
/**
* How to get avatar url
* http://www.bhalash.com/archives/13544803124
**/
function get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

$user_query = new WP_User_Query(array('role' => 'editor'));

?>

<?php if ( !empty( $user_query->results ) ) : ?>
    <br>
    <h1 class="text-center"><?php _e('The team','sage'); ?></h1>
    <br>
    <div class="ui three column grid stackable">
        <?php foreach ( $user_query->results as $user ) : ?>
            <div class="column text-center">
                <img class="ui image circular" style="display:inline" align="center" src="<? echo get_avatar_url(get_avatar( $user->user_email, 150 )); ?>"/>
                <h3><?php echo $user->display_name; ?></h3>
                <b><?php echo $user->user_email; ?></b><br>
                <b><?php echo get_user_meta($user->ID,'user_phone',true); ?></b>
                <p><?php echo get_user_meta($user->ID, 'description', true); ?></p>
                <div class="ui horizontal list">
                    <?php if(get_user_meta($user->ID, 'user_facebook', true)) : ?>
                        <div class="item">
                            <a href="<?php echo get_user_meta($user->ID, 'user_facebook', true); ?>">
                                <div class="ui circular facebook icon button">
                                    <i class="facebook icon"></i>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(get_user_meta($user->ID, 'user_twitter', true)) : ?>
                        <div class="item">
                            <a href="<? echo get_user_meta($user->ID, 'user_twitter', true); ?>">
                                <div class="ui circular twitter icon button">
                                    <i class="twitter icon"></i>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(get_user_meta($user->ID, 'user_pinterest', true)) : ?>
                        <div class="item">
                            <a href="<?php echo get_user_meta($user->ID, 'user_pinterest', true); ?>">
                                <div class="ui circular pinterest icon button">
                                    <i class="pinterest icon"></i>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(get_user_meta($user->ID, 'user_gplus', true)) : ?>
                        <div class="item">
                            <a href="<? echo get_user_meta($user->ID, 'user_gplus', true); ?>">
                                <div class="ui circular google plus icon button">
                                    <i class="google plus icon"></i>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(get_user_meta($user->ID, 'user_skype', true)) : ?>
                        <div class="item">
                            <a href="<?php echo get_user_meta($user->ID, 'user_skype', true); ?>">
                                <div class="ui circular skype icon button">
                                    <i class="skype icon"></i>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(get_user_meta($user->ID, 'user_instagram', true)) : ?>
                        <div class="item">
                            <a href="<?php get_user_meta($user->ID, 'user_instagram', true); ?>">
                                <div class="ui circular instagram icon button">
                                    <i class="instagram icon"></i>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <br>
                <?php if($languages = get_user_meta($user->ID, 'user_languages', false) ) : ?>
                    <div class="ui horizontal list">
                        <?php foreach($languages as $language) : ?>
                            <div class="item">
                                <?php _e($language); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</section>
