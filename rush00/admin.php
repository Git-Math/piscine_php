<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<?php	include("gen_navbar.php"); ?>
	</head>

	<body>
<?php
if (!is_admin($_SESSION['loggued_on_user']))
{
    echo "<h2>This page is for ADMIN only :/ </h2></body><footer>";
    include("gen_footer.php");
    echo "</footer>";
    return false;
}

if ($_POST["del_usr"] === "OK")
{
    del_bdd($_POST["login1"], "user.csv");
}
else if ($_POST["edit_pw"] === "OK")
{
    edit_pw($_POST["passwd2"], $_POST["login2"]);
}
else if ($_POST["edit_mail"] === "OK")
{
    edit_mail($_POST["mail"], $_POST["login3"]);
}
else if ($_POST["new_usr"] === "OK")
{
    new_user($_POST["login4"], $_POST["passwd3"], $_POST["mail2"], 0, null, null);
}
else if ($_POST["new_prod"] === "OK")
{
    new_product($_POST["login5"], explode(" ", $_POST["category"]), $_POST["stock"], $_POST["price"], $_POST["link"]);
}
else if ($_POST["del_prod"] === "OK")
{
    del_bdd($_POST["login6"], "product.csv");
}
else if ($_POST["edit_qtt"] === "OK")
{
    edit_bdd("stock", $_POST["login7"], $_POST["stock2"], "product.csv");
}
else if ($_POST["edit_img"] === "OK")
{
    edit_bdd("img", $_POST["login8"], $_POST["img2"], "product.csv");
}
else if ($_POST["edit_prod_name"] === "OK")
{
    edit_bdd("name", $_POST["login9"], $_POST["login10"], "product.csv");
}
else if ($_POST["edit_price"] === "OK")
{
    edit_price($_POST["price2"], $_POST["login11"]);
}

?>
		<div class="formulaire">
			<br /><h2> Supprimer utilisateur </h2>
			<form action="admin.php" method="post">
				<h4>
                    <p><label>Identifiant:</label><input type="text" name="login1" value=""></p>
                    <p><button type="submit" name="del_usr" value="OK">Supprimer</button></p>
				</h4>
			</form>
		</div>

		<div class="formulaire">
			<br /><h2> Changer le mot de passe utilisateur </h2>
			<form action="admin.php" method="post">
				<h4>
                    <p><label>Identifiant: </label><input type="text" name="login2" value=""></p>
                    <p><label>Mot de passe: </label><input type="password" name="passwd2" value=""></p>
					<p><button type="submit" name="edit_pw" value="OK">Modifier</button></p>
				</h4>
			</form>
		</div>

		<div class="formulaire">
			<br /><h2> Changer le mail utilisateur </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Identifiant:</label><input type="text" name="login3" value=""></p>
					<p><label>Mail:</label><input type="text" name="mail" value=""></p>
					<p><button type="submit" name="edit_mail" value="OK">Modifier</button></p>
				</h4>
			</form>
		</div>

		<div class="formulaire">
			<br /><h2> Creer un compte utilisateur </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Identifiant:</label><input type="text" name="login4" value=""></p>
					<p><label>Mot de passe:</label><input type="password" name="passwd3" value=""></p>
					<p><label>Mail:</label><input type="text" name="mail2" value=""></p>
					<p><button type="submit" name="new_usr" value="OK">Creer</button></p>
				</h4>
			</form>
		</div>

		<div class="formulaire">
			<br /><h2> Creer un produit </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Nom du produit:</label><input type="text" name="login5" value=""></p>
					<p><label>Categorie:</label><input type="text" name="category" value=""></p>
					<p><label>Stock:</label><input type="number" name="stock" value=""></p>
					<p><label>Prix:</label><input type="number" name="price" value=""></p>
					<p><label>Lien de limage:</label><input type="text" name="link" value=""></p>
					<p><button type="submit" name="new_prod" value="OK">Creer</button></p>
				</h4>
			</form>
		</div>

		<div class="formulaire">
			<br /><h2> Supprimer un produit </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Nom du produit:</label><input type="text" name="login6" value=""></p>
					<p><button type="submit" name="del_prod" value="OK">Supprimer</button></p>
				</h4>
			</form>
		</div>

		<div class="formulaire">
			<br /><h2> Modifier quantité </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Nom du produit:</label><input type="text" name="login7" value=""></p>
					<p><label>Nouveau stock:</label><input type="number" name="stock2" value=""></p>
					<p><button type="submit" name="edit_qtt" value="OK">Modifier</button></p>
				</h4>
			</form>
		</div>

   		<div class="formulaire">
			<br /><h2> Modifier prix </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Nom du produit:</label><input type="text" name="login11" value=""></p>
					<p><label>Nouveau prix:</label><input type="number" name="price2" value=""></p>
					<p><button type="submit" name="edit_price" value="OK">Modifier</button></p>
				</h4>
			</form>
		</div>

  		<div class="formulaire">
			<br /><h2> Modifier image </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Nom du produit:</label><input type="text" name="login8" value=""></p>
					<p><label>Nouveau lien:</label><input type="text" name="img2" value=""></p>
					<p><button type="submit" name="edit_img" value="OK">Modifier</button></p>
				</h4>
			</form>
		</div>

  		<div class="formulaire">
			<br /><h2> Modifier nom dun produit </h2>
			<form action="admin.php" method="post">
				<h4>
					<p><label>Nom du produit:</label><input type="text" name="login9" value=""></p>
					<p><label>Nouveau nom:</label><input type="text" name="login10" value=""></p>
					<p><button type="submit" name="edit_prod_name" value="OK">Modifier</button></p>
				</h4>
			</form>
		</div>

      		<div>
			<br /><h2> Liste des commandes </h2>
				<h4>
                    <?php
                        $tab = unserialize(file_get_contents("bdd/user.csv"));
                        foreach ($tab as $truc)
                        {
                            if ($truc["cmd"])
                            {
                                echo "<h3>Commande(s) de: ".$truc["id"]."<br></h3>";
                                foreach ($truc["cmd"] as $cmd)
                                {
                                    foreach ($cmd as $key => $val)
                                        echo "-$key x $val<br>";
                                    echo '<br>';
                                }
                                echo "<br>";
                            }
                            
                        }
                    ?>
				</h4>
    		</div>

	</body>

	<footer>
		<?php include("gen_footer.php"); ?>
	</footer>
</html>