<?php
// General
$general_group    = get_post_meta($post->ID,'estimate_general_group');
$general          = $general_group[0];
$titles           = $general['estimate_title'];
$prices           = $general['estimate_price'];
$currencies       = $general['estimate_currency'];
$expiry_dates     = $general['estimate_expiry_date'];
$slogans          = $general['estimate_slogan'];
$conditions       = $general['estimate_information_conditions'];
$photos           = $general['estimate_gallery'];
$peoples          = $general['estimate_people'];
$number_days      = $general['estimate_days'];
$number_nights    = $general['estimate_nights'];

$flights = get_post_meta($post->ID, 'estimate_flight_group');
/*echo('<pre>');
var_dump($flights);
echo('</pre>');*/
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
            <?php for ($i=0; $i < count($prices); $i++): ?>
              <div class="column">
                <div class="ui fluid card">
                  <div class="content">
                    <strong><?= ($titles==''?'Promotion '.$i:$titles[$i]); ?></strong>
                    <div class="right floated meta">
                      <span class="date">
                        <i class="calendar icon"></i> <?= __('Expiry date: '). $expiry_dates[$i]; ?>
                      </span>
                      <br>
                    </div>
                  </div>
                  <?php
                  /*echo('<pre>');
                  var_dump($photos[$i]);
                  echo('</pre>');*/
                  if(!empty($photos[$i])):
                  ?>
                  <div class="image">
                    <?php Gallery::show_gallery($photos[$i]); ?>
                  </div>
                  <?php
                  endif;
                  ?>
                  <div class="content">
                    <a class="header"></a>
                    <div class="meta">
                      <span class="date"><?= $slogans[$i]; ?></span>
                    </div>
                    <div class="description">
                      <?= $conditions[$i]; ?>
                    </div>
                  </div>
                  <div class="extra content">
                    <a>
                      <i class="user icon"></i>
                        <?= $peoples[$i]." person per estimated"; ?>
                    </a>
                    <span class="right floated">
                      <i class="sun icon"></i><?= $number_days[$i] . ' ' . __('days','sage'); ?>
                        /
                      <i class="moon icon"></i><?= $number_nights[$i] . ' ' . __('nights','sage'); ?>
                    </span>
                  </div>
                  <?php 	
                    include(locate_template('templates/estimate/flight.php'));
                    include(locate_template('templates/estimate/accommodation.php'));
                  ?>
                  <?php
                    $mailto = Agency::get_email();
                    $mailto .= '?subject=Offre:' . $titles[$i];
                    $mailto .= '&body=' . __('I\'ll like to order this offert','sage');
                  ?>
                  <a href="mailto:<?= $mailto; ?>" class="ui bottom attached blue button">
                    <i class="add icon"></i><?= $prices[$i] . ' ' . $currencies[$i]; ?>
                  </a>
                </div>
              </div>
            <?php endfor;?>
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
