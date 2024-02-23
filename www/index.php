<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/product_display.php";
require_once "../widgets/script.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
            \Script\Render();
            \Style\Render(); 
        ?>
    </head>
    <body>
        <?php 
            \TopBar\Render();
        ?>
        <div id="webcontent">
            <h1>Simply the best!</h1>
            <?php 
                \ProductDisplay\Render("all"); 
            ?>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
