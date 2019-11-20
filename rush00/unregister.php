<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php  include("gen_navbar.php"); ?>
      <title> UNREGISTER Nom du site</title>
	</head>

    <body>

        <h1> Supprimer votre compte </h1>
        <table style="width:100%">
    		<tr>   
              	<td class="formulaire">
                    <div>
                        <form action="index.php" method="post">
                            <h4>
                                <p>Votre mot de passe </p>
                               	<p>	<input type="password" name="passwd"></p>
                               	<p>Confirmer votre mot passe </p>
                               	<p><input type="password" name="passwdbis"></p>
                                <button type="submit" name="del_acc" value="OK">Créer</button>
                             </h4>
                         </form>
                     </div>
               	</td>
            </tr>
        </table>
	</body>

    <footer>
        <?php  include("gen_footer.php"); ?>
    </footer>
    
</html>
