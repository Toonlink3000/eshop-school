<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
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
    </body>
</html>
