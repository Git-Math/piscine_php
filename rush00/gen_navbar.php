<?php
//inclus session_start mec

include 'bdd.php';

if ($_POST['del_acc'] === 'OK') {
    if (auth($_SESSION['loggued_on_user'], $_POST['passwd']))
    {
        del_bdd($_SESSION['loggued_on_user'], "user.csv");
        $_SESSION['loggued_on_user'] = null;
    }
}

if ($_POST['reset'] === 'OK') {
	unset($_SESSION['panier']);
}
else if ($_POST['buy'] === 'OK') {
	add_cmd($_SESSION['loggued_on_user'], $_SESSION['panier']);
    $_SESSION['panier'] = null;
    save_cart($_SESSION['loggued_on_user'], null);
}

if ($_POST['logout'] === 'Logout') {
    save_cart($_SESSION['loggued_on_user'], $_SESSION['panier']);
    $_SESSION['loggued_on_user'] = null;
    $_SESSION['panier'] = null;
}
else if ($_SESSION['loggued_on_user']) {
    $login = $_SESSION['loggued_on_user'];
}
else if (auth($_POST['login'], $_POST['passwd'])) {
	$_SESSION['loggued_on_user'] = $_POST['login'];
    $_SESSION['panier'] = load_cart($_SESSION['loggued_on_user']);
	$login = $_POST['login'];
}

echo "<meta charset='utf-8'/>
	<link rel='stylesheet' type='text/css' href='style.css'>

	<div id='banner' class ='shadow'>
	<div><img id='logo' src='img/logo.png'></div>
	<div id='login'>";

if ($login = $_SESSION['loggued_on_user'])
{
	echo "<a> Bonjour $login</a><br/>
		<form action='index' method='post'>
		<input type='submit' name='logout' value='Logout'>
		</form>
		<button><a href='modif.php'>Edit account</a></button>
		";
}
else
{
	echo "<form action='index.php' method='post'>
			<input type='text' name='login' placeholder='Login'><br/>
		<input type='password' name='passwd' placeholder='Password'><br/>
		<input class='center' type='submit' name='submit' value='OK'>
		</form>
		<button><a href='register.php'>Sign in</a></button>";
}

$categorie = categories();
echo "</div>
<p id='title'>Bienvenue sur le Shop!</p>
	</div>
	<div id='navbar'>
	<div id='home'><a href='index.php'>acceuil</a>&nbsp
	<a>
	<ul class='l1'>
	<li>Categories";
$i = 0;
foreach($categorie as $value)
{
	echo "
	<ul class='l2'>
	<li><a href='index.php?category=$value'>$value</a>";
	echo "</li></ul>";
	$i++;
}
echo "</li></a></div><div id='cart'><a href=";
	if ($_SESSION["panier"] != "")
		echo '"cart.php"';
	else
		echo '"index.php"';
echo "type='submit'>Panier</a></div></div>";

?>