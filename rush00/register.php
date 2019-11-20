<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php  include("gen_navbar.php"); ?>
      <title> REGISTER Nom du site</title>
	</head>

    <body>

        <h1> Créer votre compte </h1>
        <table style="width:100%">
    		<tr>   
              	<td class="formulaire">
                    <div>
                        <form action="create.php" method="post">
                            <h4>
                                <p>Identifiant </p>
                                <p> <input type="text" name="login"></p>
                                <p>Créer votre mot de passe </p>
                               	<p>	<input type="password" name="passwd"></p>
                               	<p>Confirmer votre mot passe </p>
                               	<p><input type="password" name="passwdbis"></p>
                                <p>Adresse mail</p>
                                <p> <input type="text" name="mail"></p> 
                                <button type="submit" name="valider" value="OK">Créer</button>
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
