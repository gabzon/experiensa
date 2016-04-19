
<?php $voyages = array(); ?>
<?php $voyages = Catalog::get_catalog(); ?>

<br>
<div class="ui four stackable cards">
    <?php foreach ($voyages as $key => $value): ?>
        <?php
        if ($value['cover_image'])
            $images = [["full_size"=>$value['cover_image']]];
        else
            $images = [];
        $price = convertCurrency($value['voyage_price'], $value['voyage_currency'], Helpers::get_currency() ) . ' ' . Helpers::get_currency();
        $title = $value['title'];
        $excerpt = $value['excerpt'];
        $mailto = 'mailto:' . Helpers::get_email() . '?subject= Offre '.$value['title'];
        $contact = ["mail" => $mailto, "modal" => "modal-card-details"];
        Card::display_card_full(false,$title,$images,$excerpt,$price,$contact,[],$value);
        ?>
    <?php endforeach; ?>
</div>
<br>