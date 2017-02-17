<!-- Place content information -->
<div class="column">
    <div class="ui raised segment" style="min-height: 450px;">
    <?php
        $content = get_the_content();
        if(!empty($content) && $content !== ''):
    ?>
        <div class="ui content place-content">
            <?= $content;?>
        </div>
    <?php
        else:
            if(isset($data['name']) && !empty($data['name'])):
                $wiki_content = \Experiensa\Modules\Wikipedia::getLocationArticle($data['name']);
                if($wiki_content != ''):
    ?>
        <div class="ui content wiki-content" style="display: none;">
                <?=$wiki_content;?>
        </div>
    <?php
                endif;
            endif;
        endif;
    ?>
        <br>
        <?php if(isset($data) && !empty($data)):?>
        <div class="ui list">
            <div class="item">
                <i class="marker icon"></i>
                <div class="content">
                    <?= $data['address'];?>
                </div>
            </div>
            <?php
            if(isset($data['vicinity']) && $data['vicinity'] !== ''):
                ?>
                <div class="item">
                    <i class="building icon"></i>
                    <div class="content">
                        <?= $data['vicinity'];?>
                    </div>
                </div>
                <?php
            endif;
            ?>
            <div class="item">
                <i class="compass icon"></i>
                <div class="content">
                    <?= $data['location']->latitude.', '.$data['location']->longitude;?>
                </div>
            </div>
            <?php
            if(isset($data['phone_number']) && $data['phone_number'] !== ''):
                ?>
                <div class="item">
                    <i class="phone icon"></i>
                    <div class="content">
                        <?= $data['phone_number'];?>
                    </div>
                </div>
                <?php
            endif;
            ?>
            <?php
            if(isset($data['rating'])  && $data['rating'] !== ''):
                ?>
                <div class="item">
                    <i class="star icon"></i>
                    <div class="content">
                        <?= $data['rating'];?>
                    </div>
                </div>
                <?php
            endif;
            ?>
            <?php
            if(isset($data['website']) && $data['website'] !== ''):
            ?>
                <div class="item">
                    <i class="world icon"></i>
                    <div class="content">
                        <a href="<?= $data['website'];?>" target="_blank"><?= __('Website','sage');?></a>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
        <?php endif;?>
    </div>
</div>