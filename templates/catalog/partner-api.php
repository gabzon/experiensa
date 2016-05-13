
<?php $voyages = array(); ?>
<?php $voyages = Catalog::get_catalog();
/*echo "<pre>";
print_r($voyages);
echo "</pre>";*/
?>

<br>
<div class="ui four stackable cards">
    <?php
		foreach ($voyages as $key => $value):
			$images = array();
			$cover_image = $value['cover_image'];
			if(!empty($cover_image)){
				for($i = 0; $i < count($cover_image); $i++){
					$row['full_size'] = $cover_image[$i];
					$images[] = $row;
				}
			}
			if($value['price'])
				$price = convertCurrency($value['price'], $value['currency'], Helpers::get_currency()) . ' ' . Helpers::get_currency();
			else
				$price = __('Not available','sage');
			$title = $value['title'];
			$excerpt = $value['excerpt'];
			$mailto = 'mailto:' . Helpers::get_email() . '?subject= Offre ' . $value['title'];
			$contact = ["mail" => $mailto, "modal" => "modal-card-details"];
			$website_url = $value['website'];
			$website_name = $value['website_name'];
			Card::display_card_full(false, $title, $images, $excerpt, $price, $website_url,$website_name,$contact, [], $value);
        endforeach;
	?>
</div>
<br>
