<?php

if (isset($_GET['category'])) {
	$array = belong($_GET['category']);
	$cat = 1;
}
else
{
	$array = unserialize(file_get_contents('bdd/product.csv'));
	$cat = 0;
}

foreach ($array as $value) {
	if (!$cat) {
		$nom = $value["name"];
		$img_url = $value["img"];
	}
	else {
		$nom = $value;
		$img_url = get_value_bdd("img", $value, "product.csv");
	}
	echo "	<div class='product'>
			<p>$nom</p>
			<img class='product_img' src='$img_url' alt='$nom'/>
			<form action='add_to_cart.php' method='post'>
				<input type='number' name='qtt' placeholder='Quantité'/>
				<input class='hidden' type='text' name='prod' value='$nom'>
				<input type='submit' name='add' value='Acheter' class='button'/>
			</form>
			</div>";
}
?>