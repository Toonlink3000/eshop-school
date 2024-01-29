<?php 
namespace Products;

require_once "config.php";
require_once "database.php";

\DB\Setup();

function GetProducts() 
{
    $result = \DB\Query("SELECT * FROM Products");

    if ($result == null) 
    {
        echo "error in query";
        return null;
    }

    return $result;
}

function AddProduct(string $title, string $spec, float $price, string $resources, int $stock) 
{
    $title_clean = \DB\GetConnection()->real_escape_string($title);
    $spec_clean = \DB\GetConnection()->real_escape_string($spec);
    $resources_clean = \DB\GetConnection()->real_escape_string($title);

    \DB\Query("INSERT INTO esProducts (id, title, spec, resources, price, stock) VALUES (NULL, '$title_clean', '$spec_clean', '$resources_clean')");
}

?>