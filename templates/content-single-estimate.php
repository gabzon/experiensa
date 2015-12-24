<?php $title            = get_post_meta($post->ID,'estimate_title'); ?>
<?php $price            = get_post_meta($post->ID,'estimate_price'); ?>
<?php $currency         = get_post_meta($post->ID,'estimate_currency'); ?>
<?php $expiry_date      = get_post_meta($post->ID,'estimate_expiry_date'); ?>
<?php $slogan           = get_post_meta($post->ID,'estimate_slogan'); ?>
<?php $conditions       = get_post_meta($post->ID,'estimate_information_conditions'); ?>
<?php $photos           = get_post_meta($post->ID,'estimate_gallery'); ?>
<?php $people           = get_post_meta($post->ID,'estimate_people'); ?>
<?php $number_days      = get_post_meta($post->ID,'estimate_days'); ?>
<?php $number_nights    = get_post_meta($post->ID,'estimate_nights'); ?>

<br>
<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <br>
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
                            <div class="image">
                                <?php //echo $photo[$i]; ?>
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
                            <div class="ui bottom attached blue button">
                                <i class="add icon"></i>
                                <?= $price[$i] . ' ' . $currency[$i]; ?>
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
            <br>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <footer>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php comments_template('/templates/comments.php'); ?>
        </article>
    <?php endwhile; ?>
</div>
<br>
