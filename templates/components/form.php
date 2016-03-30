<!-- http://www.makeuseof.com/tag/tutorial-ajax-wordpress/ -->
<br>
<section id="request" class="ui basic segment" >

    <h1 class="ui center aligned header uppercase segment-content"><?php _e('Request','sage'); ?></h2>
        <form class="ui form" type="post" action="" id="newRequest" ng-app>

            <?php get_template_part('templates/components/contact'); ?>

            <!-- Destination information -->
            <?php get_template_part('templates/components/destination'); ?>

            <!-- Budget and Companions -->
            <?php get_template_part('templates/components/budget'); ?>

            <!-- Options -->
            <?php get_template_part('templates/components/options'); ?>

            <!-- Préférences -->
            <div class="ui one column grid">
                <div class="column">
                    <div class="ui fluid input field">
                        <textarea name="preferences" id="preferences" placeholder="<?php _e('Preferences','sage'); ?>" class="ui textarea wide"></textarea>
                    </div>
                </div>
            </div>
            <br>

            <!-- Checkboxes-->
            <input name="flights" type="checkbox" ng-model="flight"/>&nbsp;&nbsp;<strong class="uppercase"><i class="plane icon"></i><?php _e('Flight options','sage') ?></strong>
            <!-- Options -->
            <?php get_template_part('templates/components/flight-options'); ?>
            <br>
            <!-- Hosting information -->
            <input name="hosting" type="checkbox" ng-model="hosting"/>&nbsp;&nbsp;<strong class="uppercase"><i class="building icon"></i><?php _e('Hosting options','sage') ?></strong>
            <?php get_template_part('templates/components/hosting-options'); ?>
            <br>
            <!-- Activities information -->
            <input name="activities" type="checkbox" ng-model="activity"/>&nbsp;&nbsp;<strong class="uppercase"><i class="cocktail icon"></i><?php _e('Theme & activities options','sage'); ?></strong>
            <?php get_template_part('templates/components/theme-options'); ?>
            <br>
            <!-- Transport information -->
            <input name="transport" type="checkbox" ng-model="transport"/>&nbsp;&nbsp;<strong class="uppercase"><i class="car icon"></i><?php _e('Transport options','sage') ?></strong>
            <?php get_template_part('templates/components/transport-options'); ?>

            <input type="hidden" name="action" value="requestQuote"/>
            <?php 
            $agency_options = get_option('agency_settings');
            $agency_email = $agency_options['agency_email'];
            $agency_email = ($agency_email=="" || $agency_email==null? "gabriel@sevinci.com":$agency_email);
            ?>
            <input type="hidden" name="agency_email" value="<?php echo $agency_email; ?>"/>
            <br><br>
            <?php if( function_exists( 'gglcptch_display' ) ) { echo gglcptch_display(); } ; ?>
            <br><br>
            <input id="form-submit" type="submit" class="ui button" value="<?php _e('Request a quote','sage'); ?>">
        </form>
        <br/><br/>
        <div id="feedback"></div>
        <br/><br/>
    </section>
