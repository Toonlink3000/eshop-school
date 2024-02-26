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
            \Style\Render(); 
        ?>
    </head>
    <body>
        <?php 
            \TopBar\Render();
        ?>
        <div id="webcontent">
        <?php 
                \ProductDisplay\Render("Lidi"); 
            ?>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
