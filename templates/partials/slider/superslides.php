<!-- Super Slides Component main-slider-->
<section id="<?= $name;?>" class="super-slides-component">
    <ul class="slides-container">
        <?php foreach($data as $info):?>
            <li>
                <img src="<?= $info['image'];?>" alt="image" class="ui image"/>
                <div class="ui container" style="margin-top: 10%;">
                    <div class="ui centered grid">
                        <div class="twelve wide column" id="slider-text">
                            <h1 class="fitText" style="text-transform:uppercase"><?= $info['title'];?></h1>
                            <h4><?= $info['excerpt'];?></h4>
                            <br>
                            <a href="<?= $info['url'];?>" class="ui huge animated fade inverted button" tabindex="0">
                                <div class="visible content">
                                    <?=__('More info', 'sage');?>
                                </div>
                                <div class="hidden content">
                                    <?=__('More info', 'sage');?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
</section>