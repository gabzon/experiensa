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
            <?php
            $data = array();
            if($args['posttype']=='none'):
                $terms = Showcase::getTermByTaxonomy($args['category']);
                $info = array();
                foreach($terms as $term):
                    $query = Showcase::byTermsQueryLimitOneTerm('attachment',$args['category'],$term);
                    if($query && $query->have_posts()):
                        while ( $query->have_posts() ) :
                            $query->the_post();
                            $id = $query->post->ID;
                            $info = Showcase::getPostdataNoPosttype($args['category'],$id);
                            if ( !empty( $info ) )
                                $data[] = $info;
                        endwhile;
                    endif;
                endforeach;
            ?>
            <?php else:
                $query = Showcase::showcase_query( $args['posttype'] , $args['category']);
                if($query && $query->have_posts()):
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        $id = $query->post->ID;
                        $info = Showcase::get_post_data( $args['posttype'], $args['category'], $id );
                        if ( !empty( $info ) ):
                            $data[] = $info;
                        endif;
                    endwhile;
                endif;
            endif;?>
            <?php if(!empty($data)):// echo"<pre>";print_r($data);echo"</pre>";?>
            <div id="landing-showcase" class="landing-showcase">
                <?php Showcase::displayComponent($args['component'],$data); ?>
            </div>
            <?php else:?>
                <h3>Sorry! Currently there are no <?=__(ucfirst($args['category']),'sage');?></h3>
            <?php endif;?>
        </div>
    </section>
    <!-- END Showcase Section -->
<?php
endif;
