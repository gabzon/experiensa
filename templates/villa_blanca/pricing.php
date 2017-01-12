<section id="villa_blanca_pricing" class="ui segment vertical custom-section" style="height:100vh;">
    <div class="section-content">
        <br><br><br>
        <h1 class="text-center" style="color: #FFFFFF;"><?= $title?></h1>
        <br>
        <div class="ui one column stackable center aligned grid">
            <div class="column three wide">
                <div class="ui card">
                    <div class="content">
                        <div class="center aligned header"><?= $box_title;?></div>
                    </div>
                    <div class="center aligned content">
                        <h1 class="ui massive header"><?=$price;?><sup class="meta">€</sup></h1>
                        <div class="meta">
                            <?= $price_desc;?>
                        </div>
                        <div class="description">
                            <b><?= __("HIGH SEASON","sage");?></b>
                        </div>
                        <div class="meta">
                            <?= $high_desc;?>
                        </div>
                        <br>
                        <div class="description">
                            <b><?= __("LOW SEASON","sage");?></b>
                        </div>
                        <div class="meta">
                            <?= $low_desc;?>
                        </div>
                    </div>
                    <div class="extra center aligned content">
                        <a href="http://bnb.experiensa.com/#villa_blanca_reservations" class="ui pink button" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false"><?=$button;?></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</section>