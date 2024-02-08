<?php 
namespace ProductDisplay;
require_once "../utils/products.php";
require_once "box_display.php";

function Render(string $category) 
{
    $products = \Products\GetProductsByCat($category);

    echo "<div class=\"productcontainer\">";

    if ($products->num_rows === 0)  
    {
        echo "No products to display.</div>";
        return;
    }

    foreach ($products as $product) 
    {
        $name = $product["title"];
        $id = $product["id"];
        $resources = $product["resources"];
        $resarr = explode("|", $resources);
        $image = $resarr[0];

        $prodcode = 
        "
        <img class=\"productboximage\" src=\"resource.php?name=$image\">

        </img>
        <div class=\"productboxname\">
            $name;
        </div>
        ";

        \BoxDisplay\RenderLinked($prodcode, "Navigate(\"product.php?id=$id\")");
    }

    echo "</div>";
}