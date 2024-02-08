<?php 
namespace Order;

require_once "../utils/config.php";
require_once "../utils/database.php";

function GetOrders() 
{
    $result = \DB\Query("SELECT * FROM Orders");

    if ($result == null) 
    {
        echo "error in query";
        return null;
    }

    return $result;
}


function OrderProduct(int $product_id, int $user_id, string $address_raw) 
{
    if (empty($_SESSION["username"])) 
    {
        return false;
    }

    $user = \DB\GetConnection()->real_escape_string($user_id);
    $product = \DB\GetConnection()->real_escape_string($product_id);
    $address = \DB\GetConnection()->real_escape_string($address_raw);

    $result = \DB\Query("INSERT INTO esOrders (id, product, user, addr, stat) VALUES (NULL, $product, $user, '$address', 'Pending')");

    if ($result === false) 
    {
        return false;
    }

    return true;
}

function GetUserOrders() 
{
    if (empty($_SESSION["username"])) 
    {
        return null;
    }

    $result = \DB\Query("SELECT * FROM esOrders WHERE user=" + \DB\GetConnection()->real_escape_string($_SESSION["username"]));

    return $result;
}
