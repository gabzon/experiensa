<?php
if(!empty($data)):
?>
    <!-- Card Component -->
    <div class="ui four stackable cards">
    <?php
    foreach($data as $value):
    ?>
        <div class="ui card" style="margin: 0 10px 0 10px;">
            <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                <img src="<?=$value['image_url'];?>">
            </a>
            <div class="content">
                <div class="center aligned header"><?=$value['title'];?></div>
            </div>
            <?php if(isset($value['subtitle']) && !empty($value['subtitle'])):?>
            <div class="center aligned extra content">
                <?=$value['subtitle'];?>
            </div>
            <?php endif; ?>
          </div>
      <?php
      endforeach;
      ?>
    </div>
    <br>
<?php
endif;
