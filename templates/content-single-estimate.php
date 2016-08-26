<?php
$agency_options = get_option('agency_settings');
$agency_email = $agency_options['agency_email'];
$agency_email = ($agency_email=="" || $agency_email==null? "gabriel@sevinci.com":$agency_email);

$flights = get_post_meta($post->ID, 'estimate_flight_group');
$accommodations = get_post_meta($post->ID, 'estimate_accommodation_group');
?>
<br>
<div class="ui container" style="margin-top: 40px">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <br>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <br><br>
            <?php
            $voyage = new Experiensa\Modules\Estimate($post->ID);
            $amount = $voyage->getVoyageAmount();
            if($voyage->checkVoyagesTitle()):
            ?>
            <div class="ui three column grid stackable">
            <?php for ($i=0; $i < $amount; $i++): ?>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="content">
                            <strong><?= __('Promotion','sage').' '.$voyage->getTitle($i);?></strong>
                            <div class="right floated meta">
                                    <span class="date">
                                        <i class="calendar icon"></i> <?= __('Expiry date').': '. $voyage->getExpiryDate($i); ?>
                                    </span>
                                <br>
                            </div>
                        </div>
                        <!-- Estimate Voyage Images -->
                        <?php
                        if($voyage->checkEmptyImages($i)):
                            $images = $voyage->getImages($i);
                        ?>
                            <div class="image">
                                <?php Gallery::show_gallery($images); ?>
                            </div>
                            <?php
                        endif;
                        ?>
                        <div class="content">
                            <!-- Estimate Slogan -->
                            <div class="meta">
                                <span class="date"><?= $voyage->getSlogan($i); ?></span>
                            </div>
                            <!-- Estimate Information & Conditions -->
                            <div class="description">
                                <?= $voyage->getExtraInfo($i); ?>
                            </div>
                        </div>
                        <div class="extra content">
                            <a>
                                <i class="user icon"></i>
                                <?= $voyage->getNumberOfPeople($i).' '.__("person per estimated",'sage'); ?>
                            </a>
                            <span class="right floated">
                                <i class="sun icon"></i><?= $voyage->getDays($i) . ' ' . __('days','sage'); ?>
                                /
                                <i class="moon icon"></i><?= $voyage->getNights($i) . ' ' . __('nights','sage'); ?>
                            </span>
                        </div>
                        <!-- Estimate Voyage Flights -->
                        <?php Flights::display_flights($voyage->getFlights($i));?>
                        <!-- Estimate Accommodation Flights -->
                        <?php Accommodations::display_accommodations( $voyage->getAccommodations($i) ); ?>
                    </div>
                </div>
            <?php endfor;?>
            </div>
            <?php else:?>
                <h3><?= __('No voyages avalibles on this estimate','sage');?></h3>
            <?php endif;?>
            <br>
            <footer>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php comments_template('/templates/comments.php'); ?>
        </article>
    <?php endwhile; ?>
</div>
<br>
