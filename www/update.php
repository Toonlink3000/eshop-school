<?php 
require_once "../widgets/topbar.php";
require_once "../widgets/style.php";
require_once "../widgets/footer.php";
require_once "../widgets/product_display.php";
require_once "../widgets/script.php";
require_once "../utils/user.php";

require_once "../widgets/admin/action_ribbon.php";
require_once "../widgets/admin/product_creator.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
            \Script\RenderAdmin();
            \Style\RenderAdmin(); 
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
                <h1>Updating...</h1>
                <? 
                chdir("..");
                echo exec("bash update.sh");
                ?>
                ell oworld

            <? endif; ?>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
