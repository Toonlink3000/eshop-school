<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/product_display.php";
require_once "../widgets/script.php";
require_once "../utils/user.php";

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
            <? if (\User\CurrentElevation() != 10): ?>
                <h1>Access Denied.</h1>
            <? else: ?>
                <h1>Administration Panel</h1>
            <? endif; ?>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
