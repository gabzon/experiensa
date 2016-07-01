<?php
if(!empty($data)):
?>
    <!-- Card Component -->
    <div class="ui four stackable cards">
      <?php
      foreach($data as $value):
      ?>
      <a href="<?=$value['post_link'];?>" target="_blank">
          <div class="ui card" style="margin: 0 10px 0 10px;">
              <div class="image">
                  <img src="<?=$value['image_url'];?>">
              </div>
              <div class="content">
                  <div class="header"><?=$value['title'];?></div>
              </div>
              <?php if(isset($value['subtitle']) && !empty($value['subtitle'])):?>
              <div class="extra content"><?=$value['subtitle'];?></div>
              <?php endif; ?>
          </div>
      </a>
      <?php
      endforeach;
      ?>
    </div>
<?php
endif;
