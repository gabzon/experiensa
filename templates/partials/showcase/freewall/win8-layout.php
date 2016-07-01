<?php
if(!empty($data)):
?>
    <!-- Freewall Windows 8 Layout Component -->
    <div class="win8-layout">
        <div id="win8-freewall" class="free-wall">
<?php
    for($i=0;$i<count($data);$i++):
        if((($i+1)%2)!=0):
            if(isset($data[$i]['post_link'])):?>
                <a href="<?=$data[$i]['post_link'];?>">
        <?php endif; ?>
            <div class="item size21 level1">
                <div class="win8-wallpaper">
                    <div class="ui image">
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <h2 class="ui inverted header"><?=$data[$i]['title'];?></h2>
                                    <div class="sub header"><?=$data[$i]['subtitle'];?></div>
                                </div>
                            </div>
                        </div>
                        <img src="<?=$data[$i]['image_url'];?>" width="100%">
                    </div>
                </div>
            </div>
            <?php if(isset($data[$i]['post_link'])):?>
                </a>
            <?php endif;?>
    <?php else:
        if($i+3<count($data)):?>
            <div class="size22 level1" data-fixSize=0 data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
            <?php for($j=$i;$j<=$i+3;$j++): ?>
                    <?php if(isset($data[$j]['post_link'])):?>
                <a href="<?=$data[$j]['post_link'];?>">
                    <?php endif; ?>
                <div class="item size11">
                    <div class="win8-wallpaper">
                        <div class="ui image">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <h2 class="ui inverted header"><?=$data[$j]['title'];?></h2>
                                        <div class="sub header"><?=$data[$j]['subtitle'];?></div>
                                    </div>
                                </div>
                            </div>
                            <img src="<?=$data[$j]['thumbnail_url'];?>">
                        </div>
                    </div>
                </div>
            <?php if(isset($data[$j]['post_link'])):?>
                </a>
            <?php endif;?>
                <?php endfor;?>
            </div>
            <?php $i = $j - 1;?>
        <?php else:?>
            <?php if($i+1<count($data)):?>
            <div class="size21 level1" data-fixSize=0 data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
                <?php for($j=$i;$j<=$i+1;$j++):?>
                <?php if(isset($data[$j]['post_link'])):?>
                <a href="<?=$data[$j]['post_link'];?>">
                <?php endif; ?>
                    <div class="item size11">
                        <div class="win8-wallpaper">
                            <div class="ui image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                            <h2 class="ui inverted header"><?=$data[$j]['title'];?></h2>
                                            <div class="sub header"><?=$data[$j]['subtitle'];?></div>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?=$data[$j]['thumbnail_url'];?>">
                            </div>
                        </div>
                    </div>
                <?php if(isset($data[$j]['post_link'])):?>
                    </a>
                <?php endif; ?>
                <?php endfor;?>
            </div>
                <?php $i = $j - 1;?>
            <?php else:?>
            <?php if(isset($data[$i]['post_link'])):?>
                <a href="<?=$data[$i]['post_link'];?>">
                <?php endif; ?>
                <div class="item size21 level1">
                    <div class="win8-wallpaper">
                        <div class="ui image">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <h2 class="ui inverted header"><?=$data[$i]['title'];?></h2>
                                        <div class="sub header"><?=$data[$i]['subtitle'];?></div>
                                    </div>
                                </div>
                            </div>
                            <img src="<?=$data[$i]['thumbnail_url'];?>">
                        </div>
                    </div>
                </div>
                <?php if(isset($data[$i]['post_link'])):?>
                </a>
                <?php endif; ?>
            <?php endif;?>
        <?php endif;?>
<?php
        endif;
    endfor;
?>
        </div>
    </div>
<?php
endif;
