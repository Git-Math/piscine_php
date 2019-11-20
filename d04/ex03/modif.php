<?php
if ($_POST["login"] == null || $_POST["oldpw"] == null || $_POST["newpw"] == null || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK")
    {
        echo "ERROR\n";
        return false;
    }
$id_pw = unserialize(file_get_contents('../private/passwd'));
foreach ($id_pw as &$usr)	
    if ($usr["login"] === $_POST["login"])    
            if ($usr["passwd"] === hash('whirlpool', $_POST["oldpw"]))
            {
                $usr["passwd"] = hash('whirlpool', $_POST["newpw"]);
                file_put_contents('../private/passwd', serialize($id_pw));
                echo "OK\n";
                return false;   
            }
echo "ERROR\n";
?>