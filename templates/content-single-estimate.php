<?php
// General
$title            = get_post_meta($post->ID,'estimate_title');
$price            = get_post_meta($post->ID,'estimate_price');
$currency         = get_post_meta($post->ID,'estimate_currency');
$expiry_date      = get_post_meta($post->ID,'estimate_expiry_date');
$slogan           = get_post_meta($post->ID,'estimate_slogan');
$conditions       = get_post_meta($post->ID,'estimate_information_conditions');
$photos           = get_post_meta($post->ID,'estimate_gallery');
$people           = get_post_meta($post->ID,'estimate_people');
$number_days      = get_post_meta($post->ID,'estimate_days');
$number_nights    = get_post_meta($post->ID,'estimate_nights');

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
            <div class="ui three column grid stackable">
                <?php for ($i=0; $i < count($price); $i++): ?>
                    <div class="column">
                        <div class="ui fluid card">
                            <div class="content">
                                <strong><?php if ($title){ echo $title[$i]; } ?></strong>
                                <div class="right floated meta">
                                    <span class="date"><i class="calendar icon"></i> <?= __('Expiry date: '). $expiry_date[$i]; ?></span><br>
                                </div>
                            </div>
                            <div class="content">
                                <a class="header"></a>
                                <div class="meta">
                                    <span class="date"><?= $slogan[$i]; ?></span>
                                </div>
                                <div class="description">
                                    <?= $conditions[$i]; ?>
                                </div>
                            </div>
                            <div class="extra content">
                                <a>
                                    <i class="user icon"></i>
                                    <?= $people[$i]; ?>
                                </a>
                                <span class="right floated">
                                    <i class="sun icon"></i><?= $number_days[$i] . ' ' . __('days','sage'); ?>
                                    /
                                    <i class="moon icon"></i><?= $number_nights[$i] . ' ' . __('nights','sage'); ?>
                                </span>
                            </div>
                            <div class="image">
                                <?php $gallery = get_post_meta(get_the_ID(), 'estimate_gallery'); ?>
                                <?php Gallery::display_slider(get_the_ID(), $gallery,$i); ?>
                            </div>
                            <div class="content">
                                <?php get_template_part('templates/estimate/flight'); ?>
                            </div>
                            <?php
                                $mailto = Agency::get_email();
                                $mailto .= '?subject=Offre:' . $title[$i];
                                $mailto .= '&body=' . __('I\'ll like to order this offert','sage');
                            ?>
                            <a href="mailto:<?= $mailto; ?>" class="ui bottom attached blue button">
                                <i class="add icon"></i><?= $price[$i] . ' ' . $currency[$i]; ?>
                            </a>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
            <br>
            <footer>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php comments_template('/templates/comments.php'); ?>
        </article>
    <?php endwhile; ?>
</div>
<br>
