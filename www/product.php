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
                    $id = $product["id"];
                    $images = explode("|", $product["resources"]);
                    $disp = array();

                    echo "<h1>$name</h1>";

                    ?> 
                    <div id="product_images">
                    <?
                    foreach ($images as $image) 
                    {
                        if ($image != "") 
                        {
                            echo "<img src=\"resource.php?name=$image\">";
                        }
                    }
                    ?> 
                    <div id="product_images">
                    <?

                    echo "<button onclick=\"AddToBasket($id)\">Add to basket!</button>";
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
