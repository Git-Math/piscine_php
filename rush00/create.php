<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php  include("gen_navbar.php"); ?>
        <?php  include("bdd.php"); ?>
      <title> REGISTER </title>
     
  </head>
  <body>
  	<?php
  	if ($_POST[login] == "" || $_POST[passwd] == "" || $_POST[passwdbis] == "" || $_POST[passwd] != $_POST[passwdbis] || $_POST[mail] == "")
    	{
    		echo "<h4 style='text-align:center; font-size: 2em;'> champ invalide</h4> <BR />";
    		echo "<center><button><a href='register.php'>Retour</a></button></center>";
    		return FALSE;
    	}
	if ($_POST[login] && $_POST[passwd] && $_POST[passwdbis] && ($_POST[passwd] == $_POST[passwdbis]) && $_POST[mail])
		{
			if (new_user($_POST[login], $_POST[passwd], $_POST[mail], "", "", ""))
				header("location: index.php");	
			else
			{
				echo "<h4 style='text-align:center; font-size: 2em;'> champ invalide</h4> <BR />";
    			echo "<center><button><a href='register.php'>Retour</a></button></center>";
    			return false;
			}
		}
	?>    

</body>

    <footer>
        <?php  include("gen_footer.php"); ?>
    </footer>
    
</html>