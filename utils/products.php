<?php 
namespace Products;

require_once "../utils/config.php";
require_once "../utils/database.php";

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

?>