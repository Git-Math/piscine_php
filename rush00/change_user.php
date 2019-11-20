<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php  include("gen_navbar.php"); ?>
        <?php  include("bdd.php"); ?>
      <title> Change user data</title>
     
  </head>
  <body>
  	<?php
  	if ($_POST[login] == "" || $_POST[passwd] == "" || (($_POST[passwdbis] == "" || strlen($_POST[passwdbis]) < 6 || strlen($_POST[passwdbis]) > 16 ) && $_POST[mail] == "") || auth($_POST[login], $_POST[passwd]) === false)
    	{
        echo "<h4 style='text-align:center; font-size: 2em;'> champ invalide</h4> <BR />";
        echo "<center><button><a href='modif.php'>Retour</a></button></center>";
        return FALSE;
      }
	if ($_POST[passwdbis] != "" && $_POST[mail] == "")
    {
      if (edit_pw($_POST[passwdbis], $_POST[login]) === false)
      {
        echo "<h4 style='text-align:center; font-size: 2em;'> champ invalide</h4> <BR />";
        echo "<center><button><a href='modif.php'>Retour</a></button></center>";
        return FALSE;
      }
      else
        header("location: index.php");
    }
    
   else if ($_POST[mail] != "" && $_POST[passwdbis] == "")
    {
      if (edit_mail($_POST[mail], $_POST[login]) === false)
      {
        echo "<h4 style='text-align:center; font-size: 2em;'> champ invalide</h4> <BR />";
        echo "<center><button><a href='modif.php'>Retour</a></button></center>";
        return FALSE;
      }
      else
        header("location: index.php");
		}
    else if ($_POST[mail] != "" && $_POST[passwdbis] != "")
    {
     if (edit_mail($_POST[mail], $_POST[login]) === false || edit_pw($_POST[passwdbis], $_POST[login]) === false)
      {
        echo "<h4 style='text-align:center; font-size: 2em;'> champ invalide</h4> <BR />";
        echo "<center><button><a href='modif.php'>Retour</a></button></center>";
        return FALSE;
      }
      else
        header("location: index.php"); 
    }
	?>    

</body>

    <footer>
        <?php  include("gen_footer.php"); ?>
    </footer>
    
</html>