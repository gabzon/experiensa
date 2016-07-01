<?php
if(!empty($data)):
?>
    <!-- Button Component -->
    <div class="ui centered grid">
    <?php
    foreach($data as $value):
        if(!isset($value['post_link'])):
    ?>
            <button id="<?=$value['filter-class'];?>" class="ui basic button" data-filter="<?=$value['filter-data'];?>" style="font-weight:bold">
        <?php
        else:
        ?>
            <a class="ui basic button" href="<?=$value['post_link'];?>" style="font-weight:bold">
        <?php
        endif;
        ?>
                <?=$value['title'];?>
        <?php
        if(!isset($value['post_link'])):
        ?>
            </button>
        <?php
        else:
        ?>
            </a>
    <?php
        endif;
    endforeach;
    ?>
    </div>
<?php
endif;