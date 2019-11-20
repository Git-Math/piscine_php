<?PHP
session_start();
function addprod()
{
	if (!isset($_POST["prod"]) || !isset($_POST["qtt"]) || $_POST["prod"] === "" || $_POST["qtt"] === "")
		return false;
	$_SESSION["panier"][$_POST["prod"]] = $_POST["qtt"];
}

function delprod($name)
{
	unset($_SESSION["panier"][$name]);
}

function editprod($name, $qtt)
{
	if (!isset($name) || !isset($qtt) || $qtt === "" || $name === "")
        return false;
	$_SESSION["panier"][$name] = $qtt;
}
?>
