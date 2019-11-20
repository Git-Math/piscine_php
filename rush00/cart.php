<?php session_start();
include 'cookfunc.php';

if ($_POST["edit"] == "OK")
{
    foreach($_SESSION["panier"] as $key => $value)
    {
        if ($_POST[$key] != 0)
            editprod($key, $_POST[$key]);
        else
            delprod($key);
		unset($_POST[$key]);
	}
}
if (count($_SESSION["panier"]) == 0)
	unset($_SESSION["panier"]);
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Skateshop</title>
         <?php	include("gen_navbar.php"); ?>
    </head>

    <body>
        <center>
            <div class="section">
                <section>
                    <table>
                        <tr>
                            <td>Produit</td>
                            <td>Quantite</td>
                            <td>Prix</td>
                    	</tr>
                    	<form action="cart.php" method="post">
<?PHP
$total = 0;
	if (count($_SESSION["panier"]) != 1)
		foreach($_SESSION["panier"] as $key=>$value)
		{
            $price = get_value_bdd("price", $key, "product.csv") * $value;
			echo "<tr><td>$key</td><td><input type='number' name='$key' value='$value' min='0'/></td><td>$price</td></tr>";
            $total += $price;
        }
	else
		foreach($_SESSION["panier"] as $key=>$value){
            $price = get_value_bdd("price", $key, "product.csv") * $value;
			echo "<tr><td>$key</td><td><input type='number' name='$key' value='$value' min='1'/></td><td>$price</td></tr>";
            $total += $price;
        }
echo '<button type="submit" name="edit" value="OK" class="bouton">Modifier</button>';
echo "Total =".$total."$";
?>

                        </form>
                    </table>
                    <br />
                    <form action="index.php" method="post">
                        <button type="submit" name="reset" value="OK" class="bouton">Annulation</button>
                    </form>
                    <form action="index.php" method="post">
                        <button type="submit" name="buy" value="OK" class="bouton">Achat</button>
                    </form>
                </section>
             </center>
          </body>

	<footer>
        <?php	include("gen_footer.php"); ?>
	</footer>
</html>