<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
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
            <h1>Hello, world!</h1>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
