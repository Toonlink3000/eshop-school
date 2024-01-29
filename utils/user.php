<?php 
namespace User;

require_once "database.php";
require_once "orders.php";

session_start();
\DB\Setup();

function Login(string $username, string $password) 
{
    $hash = password_hash($password, PASSWORD_DEFAULT)
    $username_clean = \DB\GetConnection()->real_escape_string($username);

    $result = Query("SELECT TOP 1 * FROM esUsers WHERE username = '$username_clean' AND pass = '$hash'");

    if ($result == false) 
    {
        return null;
    }

    $user = $result.fetch_assoc();

    $_SESSION["username"] = $user["username"];
    $_SESSION["id"] = $user["id"];
    $_SESSION["address"] = $user["addr"];
}

function Logout() 
{
    unset($_SESSION["username"]);
    unset($_SESSION["id"]);
}

function CurrentBasket() 
{
    if (!empty($_SESSION["basket"])) 
    {
        return $_SESSION["basket"];
    }
    return null;
}

function CurrentOrders() 
{
    if (!empty($_SESSION["id"])) 
    {
        return \Order\GetOrders();
    }
    return null;
    
}

function CurrentUsername() 
{
    if (!empty($_SESSION["username"])) 
    {
        return $_SESSION["username"];
    }
    return null;
}

function AddToBasket(int $product_id)
{
    if (!empty($_SESSION["basket"])) 
    {
        array_push($_SESSION["basket"], $product_id);
    }
    $_SESSION["basket"] = array(0 => $product_id);
}

// 
function Checkout() 
{
    if (!empty($_SESSION["basket"])) 
    {
        if (empty($_SESSION["user"])) 
        {
            $user = -1;
        }
        else 
        {
            $user = $_SESSION["id"]
        }

        if (empty($_SESSION["address"])) 
        {
            return false;
        }
        $address = $_SESSION["address"];

        foreach($_SESSION["basket"] as $item) 
        {
            \Order\OrderProduct($item, $user, $address);
        }
        return true;
    }
}

?>