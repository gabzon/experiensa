<!-- Place content information -->
<div class="column">
    <div class="ui raised segment">
        <p><?php the_content(); ?></p>
        <?php
//        var_dump($data);
        ?>
        <br>
        <div class="ui list">
            <div class="item">
                <i class="marker icon"></i>
                <div class="content">
                    <?= $data['address'];?>
                </div>
            </div>
            <?php
            if(isset($data['vicinity'])):
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
            if(isset($data['phone_number'])):
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
            if(isset($data['rating'])):
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
            if(isset($data['website'])):
            ?>
                <div class="item">
                    <i class="world icon"></i>
                    <div class="content">
                        <a href="<?= $data['website'];?>" target="_blank"><?= $data['website'];?></a>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>