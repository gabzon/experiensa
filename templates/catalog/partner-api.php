
<?php $voyages = array(); ?>
<?php $voyages = Catalog::get_catalog();
/*echo "<pre>";
print_r($voyages);
echo "</pre>";*/
?>

<br>
<div class="ui four stackable cards">
    <?php foreach ($voyages as $key => $value): ?>
        <?php
        if ($value['cover_image'])
            $images = [["full_size"=>$value['cover_image']]];
        else
            $images = [];
        if(!empty($value['price'])) {
            $price = convertCurrency($value['price'], $value['currency'], Helpers::get_currency()) . ' ' . Helpers::get_currency();
            $title = $value['title'];
            $excerpt = $value['excerpt'];
            $mailto = 'mailto:' . Helpers::get_email() . '?subject= Offre ' . $value['title'];
            $contact = ["mail" => $mailto, "modal" => "modal-card-details"];
            $website_url = $value['website'];
            $website_name = $value['website_name'];
            Card::display_card_full(false, $title, $images, $excerpt, $price, $website_url,$website_name,$contact, [], $value);
        }
        ?>
    <?php endforeach; ?>
</div>
<br>