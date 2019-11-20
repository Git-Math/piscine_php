<?php
session_start();

function addprod()
{
	if (!isset($_POST["prod"]) || $_POST["prod"] === "")
		return false;
	$_SESSION["panier"][$_POST["prod"]] += $_POST["qtt"];
}
if (!$_POST['qtt'])
	$_POST['qtt'] = 1;
addprod();
header('location: index.php');
?>