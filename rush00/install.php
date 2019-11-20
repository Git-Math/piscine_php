#!/usr/bin/php
<?php
include 'bdd.php';
//user.csv : id, pw, mail, admin, cart[], cmd[]
//product.csv : name, category[], stock, price, img

//set bdd
function set_bdd() //MoveTo install.php
{
    //check if directorie exists
    if (!file_exists("bdd"))
	{
		mkdir("bdd");
		echo "bdd directory created\n";
	}
	//add default user (admin)
	//add default user (admin)
	$new_user["id"] = "admin";
	$new_user["pw"] = hash("whirlpool", "admin");
	$new_user["mail"] = "admin@student.42.fr";
	$new_user["admin"] = 1;
    $new_user["cart"] = null;
	$new_user["cmd"] = null;
	$user[] = $new_user;
	file_put_contents('bdd/user.csv', serialize($user));
	echo "admin created\n";
	if (!new_user("thomas", "thomas", "tpayet@student.42.fr", 0, null, null))
		return false;
	echo "thomas created\n";

//add main products
	$new_product["name"] = "product1";
	$new_product["category"] = ["cool", "flex"];
	$new_product["stock"] = 21;
	$new_product["price"] = 42;
	$new_product["img"] = "http://www.ecommerce-webmarketing.com/wp-content/uplo\ads/2013/11/produit.jpg";
	$product[] = $new_product;
	file_put_contents('bdd/product.csv', serialize($product));

	new_product("Fifa15", ["Jeu de Sport"], 50, 45, "http://cdn.idealo.com/folder/Product/4394/7/4394722/s1_produktbild_mid/fifa-15-ps4.jpg");
	new_product("Call of Duty, Black Ops 3", ["Jeu de Guerre"], 15, 70, "http://vignette1.wikia.nocookie.net/codfanfic/images/4/46/Call-of-duty-black-ops-3.jpg");
	new_product("Street Fighter X Tekken", ["Jeu de Combat"], 78, 52, "http://cdn-static.gamekult.com/gamekult-com/images/photos/00/01/44/47/street-fighter-x-tekken-jaquette-ME0001444709_2.jpg");
	new_product("Pokemon Version Perle", ["Jeu de Role", "Jeu d'Aventure"], 12, 40, "http://cdn-static.gamekult.com/gamekult-com/images/photos/00/00/85/75/ME0000857586_2.jpg");
	new_product("Pokemon Version Saphir Alpha", ["Jeu de Role", "Jeu d'Aventure"], 125, 45, "http://www.pokemontrash.com/rubis-omega-saphir-alpha/images/jaquettes/saphir-alpha-pre.jpg");
	new_product("Pokemon Version Soul Silver", ["Jeu de Role", "Jeu d'Aventure"], 62, 45, "http://media.senscritique.com/media/000000044784/source_big/Pokemon_Version_Argent_Soul_Silver.jpg");
	new_product("Kingdom Hearts HD 1.5", ["Jeu Action-RPG", "Jeu d'Aventure"], 62, 50, "http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/13/58/kingdom-hearts-hd-1-5-remix-jaquette-ME3050135846_2.jpg");
	new_product("Kingdom Hearts HD 2.5", ["Jeu Action-RPG", "Jeu d'Aventure"], 42, 55, "http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/30/40/kingdom-hearts-hd-2-5-remix-pochette-ME3050304059_2.jpg");
	new_product("Kingdom Hearts 3", ["Jeu Action-RPG", "Jeu d'Aventure"], 6, 250, "http://images.latintimes.com/sites/latintimes.com/files/1/54/15472.png");
	new_product("Super Smash Bros Wii U", ["Jeu de Combat"], 135, 45, "http://www.bestbuy.ca/multimedia/Products/500x500/102/10255/10255551.jpg");
	new_product("Super Smash Bros Melee", ["Jeu de Combat"], 9, 56, "http://static.nintendomaine.com/2014/11/Super_Smash_Bros_Melee-boite.jpg");
	new_product("Super Smash Bros Brawl", ["Jeu de Combat"], 17, 29, "http://90plan.ovh.net/~ssbexper/images/ssbb/cover_us_recto.jpg");
	new_product("Zelda The Wind Waker", ["Jeu d'Action", "Jeu d'Aventure"], 63, 49, "http://document.nintendo-difference.com/1673/box/01.jpg");
	new_product("Zelda Ocarina Of Time", ["Jeu d'Action", "Jeu d'Aventure"], 6, 250, "http://www.gamecash.fr/medias/the-legend-of-zelda-ocarina-of-time-e52800.jpg");
	new_product("Zelda Majoras Mask", ["Jeu d'Action", "Jeu d'Aventure"], 93, 39, "http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/41/01/the-legend-of-zelda-majoras-mask-3d-jaquette-ME3050410119_2.jpg");
	echo "products created\n";

	return true;
}

if (!set_bdd())
	echo "set bdd failed\n";

/*
echo "p:\n";
print_r(unserialize(file_get_contents("bdd/product.csv")));
echo "\n\nu:\n";
print_r(unserialize(file_get_contents("bdd/user.csv")));
*/
?>