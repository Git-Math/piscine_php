<?php

//user.csv : id, pw, mail, admin, cart[], cmd[]
//product.csv : name, category[], stock, price, img

//get value from a key, searching with a login/product name
function get_value_bdd($key, $name, $bdd)
{
    if (!file_exists("bdd/".$bdd))
        return false;

	$tab = unserialize(file_get_contents("bdd/".$bdd));
	$type = ($bdd === "user.csv") ? "id" : "name";

	foreach ($tab as $stuff)
		if ($stuff[$type] === $name)
			return $stuff[$key];

	return false;
}

//check a key/value couple
function check_bdd($key, $value, $bdd)
{
	if (!file_exists("bdd/".$bdd))
		return false;

	$tab = unserialize(file_get_contents("bdd/".$bdd));

	foreach ($tab as $stuff)
		if ($stuff[$key] === $value)
			return true;

	return false;
}

//edit value of a key in specified bdd, searching with a login/product name
function edit_bdd($key, $name, $new_val, $bdd)
{
	if (!file_exists("bdd/".$bdd))
		return false;

	$tab = unserialize(file_get_contents("bdd/".$bdd));
	$type = ($bdd === "user.csv") ? "id" : "name";

	//hash it :o
	if ($key === "pw")
		$new_val = hash("whirlpool", $new_val);

	$len = count($tab);
	for ($i = 0; $i < $len; $i++)
		if ($tab[$i][$type] === $name)
		{
			$tab[$i][$key] = $new_val; //may need to be htmlspecialcharised before
			file_put_contents("bdd/".$bdd, serialize($tab));
			return true;
		}

	return false;
}

//del a "block" (ex: id, pw, mail, admin && cmd[] for a specified name)
function del_bdd($name, $bdd)
{
	if (!file_exists("bdd/".$bdd) || $name === "admin")
		return false;

	$tab = unserialize(file_get_contents("bdd/".$bdd));
	$type = ($bdd === "user.csv") ? "id" : "name";

	$len = count($tab);
	for ($i = 0; $i < $len; $i++)
		if ($tab[$i][$type] === $name)
		{
			unset($tab[$i]);
			file_put_contents("bdd/".$bdd, serialize(array_values($tab)));
			return true;
		}

	return false;
}

//add a new product in bdd
function new_product($name, $category, $stock, $price, $img)
{
	$product = unserialize(file_get_contents("bdd/product.csv"));

	$name = htmlspecialchars($name);
	//check if name exists
	$len = count($product);
	for ($i = 0; $i < $len; $i++)
		if ($product[$i]["name"] === $name)
			return false;

	$new_product["name"] = $name;
	$new_product["category"] = $category; //TODO catch htmlspecialchars before
	$new_product["stock"] = htmlspecialchars($stock);
	$new_product["price"] = htmlspecialchars($price);
	$new_product["img"] = $img;

	$product[] = $new_product;
	file_put_contents('bdd/product.csv', serialize($product));

	return true;
}

//add a new user in bdd
function new_user($id, $pw, $mail, $admin, $cart, $cmd)
{
	$user = unserialize(file_get_contents("bdd/user.csv"));

	//check if id is valid
	if (preg_match("#[^a-zA-Z0-9]#", $id) || strlen($id) > 10)
		return false;

	//check if pw is valid
	if (preg_match("#[^a-zA-Z0-9]#", $pw) || strlen($pw) > 16 || strlen($pw) < 5)
		return false;

	//check if mail is valid
	if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
		return false;

	$id = htmlspecialchars($id);
	//check if id/mail exists
	$len = count($user);
	for ($i = 0; $i	< $len; $i++)
		if ($user[$i]["id"] === $id || $user[$i]["mail"] === $mail)
			return false;

	$new_user["id"] = $id;
	$new_user["pw"] = hash("whirlpool", $pw);
	$new_user["mail"] = htmlspecialchars($mail);
	$new_user["admin"] = $admin;
	$new_user["cart"] = $cart; //TODO catch htmlspecialchars before
	$new_user["cmd"] = $cmd; //TODO catch htmlspecialchars before

	$user[] = $new_user;
	file_put_contents('bdd/user.csv', serialize($user));

	return true;
}

//add specified value (could be negative...) to the stock of the product
function add_stock($ammount, $name)
{
	if (!($old_stock = get_value_bdd("stock", $name, "product.csv")))
		return false;
	if ($old_stock + $ammount < 0)
		return false;
	if (!edit_bdd("stock", $name, $old_stock + $ammount, "product.csv"))
		return false;

	return true;
}

//edit an user's mail
function edit_mail($mail, $id)
{
	//check if mail is valid
	if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
		return false;

	if (!edit_bdd("mail", $id, $mail, "user.csv"))
		return false;

	return true;
}

//edit an user's pw
function edit_pw($pw, $id)
{
	if ($id === "admin" || preg_match("#[^a-zA-Z0-9]#", $pw) || strlen($pw) > 16 || strlen($pw) < 6)
		return false;

	if (!edit_bdd("pw", $id, $pw, "user.csv"))
		return false;

	return true;
}

//edit a product's price
function edit_price($price, $name)
{
	if (!edit_bdd("price", $name, $price, "product.csv"))
		return false;

	return true;
}

//check usr/pw
function auth($id, $pw)
{
	if (!file_exists("bdd/user.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/user.csv"));

	foreach ($tab as $stuff)
		if ($stuff["id"] === htmlspecialchars($id) && $stuff["pw"] === hash("whirlpool", $pw))
			return true;

	return false;
}

//list categories
function categories()
{
	if (!file_exists("bdd/product.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/product.csv"));
	$a = [];
	foreach ($tab as $stuff)
	{
		foreach ($stuff["category"] as $val)
			if (array_search($val, $a) === false)
				$a[] = $val;
	}
	return $a;
}

//find products that belong to a category
function belong($category)
{
	if (!file_exists("bdd/product.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/product.csv"));
	$a = [];
	foreach ($tab as $stuff)
		if (array_search($category, $stuff["category"]) !== false)
			$a[] = $stuff["name"];
	return $a;
}

//add cart to order history
function add_cmd($id, $cart)
{
	if (!file_exists("bdd/user.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/user.csv"));

	foreach ($tab as &$stuff)
		if ($stuff["id"] === $id)
		{
			$stuff["cmd"][] = $cart;
			file_put_contents("bdd/user.csv", serialize($tab));
			return true;
		}
	return false;
}

//save cart to bdd
function save_cart($id, $cart)
{
	if (!file_exists("bdd/user.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/user.csv"));

	if (!edit_bdd("cart", $id, $cart, "user.csv"))
		return false;

	return true;
}

//load cart from bdd
function load_cart($id)
{
	if (!file_exists("bdd/user.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/user.csv"));

	if (!($value = get_value_bdd("cart", $id, "user.csv")))
		return false;

	return $value;
}

//check if an user is admin
function is_admin($id)
{
	if (!file_exists("bdd/user.csv"))
		return false;

	$tab = unserialize(file_get_contents("bdd/user.csv"));

	foreach ($tab as $stuff)
		if ($stuff["id"] === $id && $stuff["admin"] === 1)
			return true;

	return false;
}
?>