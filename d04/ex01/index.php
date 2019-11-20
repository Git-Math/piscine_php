<?php
session_start();
if ($_GET['submit'] == "OK")
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ex01 : session</title>
        <style>
            body {font-family:verdana; margin-left:20%;}
            h1 {text-align: center;}
        </style>
    </head>
    <body>
        <h1>ex01 : session</h1>
        <br />
        <form action="index.php" method="get" >
            Identifiant: <input type="text" name="login" value="<?php
if ($_SESSION['login'] !== false)
    echo $_SESSION['login'];
?>">
			<br />       
            Mot de passe: <input type="password" name="passwd" value="<?php
if ($_SESSION['passwd'] !== false)
    echo $_SESSION['passwd'];
?>">
            <input type="submit" name="submit" value="OK"></button>
        </form>
    </body>
<html>