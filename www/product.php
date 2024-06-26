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

            if (\User\CurrentElevation() == 10 and isset($_GET["delete"]))
            {
                \Products\DeleteProduct(intval($_GET["delete"]));
            }

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
                            echo "<img style=\"max-width:250px; max-height: 250px;\" src=\"resource.php?name=$image\">";
                        }
                    }
                    ?> 
                    <div id="product_images">
                    <?

                    echo "<button onclick=\"AddToBasket($id)\">Add to basket!</button>";
                    if (\User\CurrentElevation() == 10)
                    {
                        ?><form action="" method="GET"><input type="hidden" name="delete" value=<?php echo ($_GET["id"]); ?>><button type="submit">DELETE</button></form> <?php
                    }
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
