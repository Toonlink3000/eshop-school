<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/product_display.php";
require_once "../widgets/script.php";
require_once "../widgets/order_list.php"

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
            <? if (\User\CurrentElevation() == 0): ?>
                <h1>Access Denied.</h1>
            <? else: ?>
                <h1>Orders</h1>
                <? \OrderList\Render(); ?>
            <? endif; ?>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
