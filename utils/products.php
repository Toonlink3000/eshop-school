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

function AddProduct() 
{
    
}

?>