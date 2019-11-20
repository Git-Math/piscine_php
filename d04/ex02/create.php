<?php
//check if we have some data from POST method
if ($_POST["login"] == null || $_POST["passwd"] == null || $_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
{
    echo "ERROR\n";
    return false;
}

//check if directories exist
if (!file_exists("../private"))
	mkdir("../private");

//check if login already exists
if (file_exists("../private/passwd"))
{
	$id_pw = unserialize(file_get_contents('../private/passwd'));
	foreach ($id_pw as $usr)
		if ($usr["login"] === $_POST["login"]) //todo
		{
			echo "ERROR\n";
			return false;
		}
}

//saving data
$tmp["login"] = $_POST["login"];
$tmp["passwd"] = hash('whirlpool', $_POST["passwd"]);
$id_pw[] = $tmp;
file_put_contents('../private/passwd', serialize($id_pw));

//yay
echo "OK\n";
?>
