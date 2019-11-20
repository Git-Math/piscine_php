<?php

include "auth.php";
session_start();

if ($_GET["login"] == null || $_GET["passwd"] == null || $_GET["login"] === "" || $_GET["passwd"] === "" || !auth($_GET["login"], $_GET["passwd"]))
{
    $_SESSION["loggued_on_user"] = "";
    echo "ERROR\n";
    return false;
}

$_SESSION["loggued_on_user"] = $_GET["login"];

echo "OK\n";
?>