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

            if (isset($_GET["id"]))
            {
                $product = \Products\GetProduct(intval($_GET["id"]));
                if ($product == false) 
                {
                    die("Invalid product");
                }
            }
        ?>
        <div id="webcontent">
            <?php 
                if (!empty($product)) 
                {
                    $name = $product["title"];
                    echo "<h1>$name</h1>";
                }

            ?>
            <?php 
                //\ProductDisplay\Render("main"); 
            ?>
        </div>
        <?php 
            \Footer\Render();
        ?>
    </body>
</html>
