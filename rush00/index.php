<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Skateshop</title>
        <?php  include("gen_navbar.php"); ?>
    </head>

    <body>
        <center>
           <?php include("gen_product_list.php"); ?>
        </center>
    </body>

    <footer>
        <?php  include("gen_footer.php"); ?>
    </footer>
</html>