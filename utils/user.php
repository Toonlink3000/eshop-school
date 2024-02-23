<?php 
namespace User;

require_once "database.php";
require_once "orders.php";

session_start();
\DB\Setup();

function Login(string $username, string $password) 
{
    //$hash = password_hash($password, PASSWORD_BCRYPT);
    $username_clean = \DB\GetConnection()->real_escape_string($username);

    $result = \DB\Query("SELECT * FROM esUsers WHERE username = '$username_clean'");
    if ($result == false) 
    {
        return null;
    }

    $found = false;
    while($user = $result->fetch_assoc()) 
    {
        if (password_verify($password, $user["pass"])) 
        {
            $found = true;
            break;
        }
    }
    if (!$found)
    {
        return null;
    }

    $_SESSION["username"] = $user["username"];
    $_SESSION["id"] = $user["id"];
    $_SESSION["address"] = $user["addr"];
    $_SESSION["elevation"] = $user["elevation"];
    return true;
}

function CreateAccount(string $username, string $password) 
{
    $hash = \DB\Escape(password_hash($password, PASSWORD_BCRYPT));
    $username_clean = \DB\Escape($username);

    $result = \DB\Query("INSERT INTO esUsers (id, username, pass, userimage, addr, elevation) VALUES (NULL, '$username_clean', '$hash', 'NONE', 'NONE', 0)");

    if ($result == false) 
    {
        return null;
    }
    return Login($username, $password);
}

function IsLoggedIn() 
{
    if (isset($_SESSION["username"]) && isset($_SESSION["id"])) 
    {
        return true;
    }
    return false;
}

function Logout() 
{
    unset($_SESSION["username"]);
    unset($_SESSION["id"]);
    unset($_SESSION["basket"]);
    unset($_SESSION["elevation"]);
}

function CurrentBasket() 
{
    if (!empty($_SESSION["basket"])) 
    {
        return $_SESSION["basket"];
    }
    return array();
}

function CurrentOrders() 
{
    if (!empty($_SESSION["id"])) 
    {
        return \Order\GetOrders();
    }
    return null;
    
}

function CurrentElevation() 
{
    if (!empty($_SESSION["elevation"])) 
    {
        return $_SESSION["elevation"];
    }
    return -1;
}

function CurrentUsername() 
{
    if (!empty($_SESSION["username"])) 
    {
        return $_SESSION["username"];
    }
    return "Guest";
}

function AddToBasket(int $product_id)
{
    if (!empty($_SESSION["basket"])) 
    {
        array_push($_SESSION["basket"], $product_id);
    }
    else
    {
        $_SESSION["basket"] = array($product_id);
    }
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
            $user = $_SESSION["id"];
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