<?php
if(!empty($args)):
?>
    <!-- Showcase Section -->
    <section id="<?=$args['category'];?>" class="ui basic <?=get_the_color($args['color'], $args['inverted']);?> vertical segment center aligned">
        <br><br>
        <div class="ui container">
            <h1 class="ui <?=get_the_aligment($args['title_alignment']);?> huge header">
                <div class="content">
                <?php if(!$args['title']):?>
                    <?= __(ucfirst($args['category']),'sage');?>
                <?php else:?>
                    <?=$args['title'];?>
                <?php endif;?>
                    <div class="sub header"><?= $args['subtitle']?></div>
                </div>
            </h1>
            <?php $query = Showcase::showcase_query( $args['posttype'] , $args['category']);?>
            <?php if($query && $query->have_posts()):?>
            <div id="landing-showcase" class="landing-showcase">
            <?php while ( $query->have_posts() ) :
                    $query->the_post();
                    $id = $query->post->ID;
                    $info = Showcase::get_post_data( $args['posttype'], $args['category'], $id );
                    if ( !empty( $info ) ): $data[] = $info; else: $data = array(); endif;
            ?>
            <?php endwhile;?>
                <?php if(!empty($data)):
                        Showcase::displayComponent($args['component'],$data);
                      else:?>
                    <h3>Sorry! Currently there are no <?=__(ucfirst($args['category']),'sage');?></h3>
                <?php endif;?>
            </div>
            <?php else:?>
                <h3>Sorry! Currently there are no <?=__(ucfirst($args['category']),'sage');?></h3>
            <?php endif;?>
        </div>
    </section>
    <!-- END Showcase Section -->
<?php
endif;
