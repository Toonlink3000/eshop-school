<?php 
namespace ProductDisplay;
require_once "../utils/products.php";
require_once "box_display.php";

function Render(string $category) 
{
    $products = \Products\GetProductsByCat($category);

    foreach ($products as $product) 
    {
        $name = $product["name"];
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

        \BoxDisplay\Render
    }
}