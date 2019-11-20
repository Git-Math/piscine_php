<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php  include("gen_navbar.php"); ?>
        <?php  include("bdd.php"); ?>
      <title> REGISTER Nom du site</title>
     
  </head>
  <body>
  <h1> Modifier votre compte </h1>
        <table style="width:100%">
    		<tr>   
              	<td class="formulaire">
                    <div>
                        <form action="change_user.php" method="post">
                            <h4>
                                <p>Identifiant </p>
                                <p> <input type="text" name="login"></p>
                                <p>Votre mot de passe </p>
                               	<p>	<input type="password" name="passwd"></p>
                               	<p>Nouveau mot de  passe </p>
                               	<p><input type="password" name="passwdbis"></p>
                                <p>Nouveau mail</p>
                                <p> <input type="text" name="mail"></p> 
                                <button type="submit" name="valider" value="OK">Modifier</button>
                             </h4>
                         </form>
                     </div>
               	</td>
            </tr>
        </table>

    <center><h2><a href="unregister.php"> Desinscription <a></h2></center>
	</body>

    <footer>
        <?php  include("gen_footer.php"); ?>
    </footer>
    
</html>