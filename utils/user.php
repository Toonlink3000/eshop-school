<?php 
namespace User;

session_start();

function CurrentUserBasket() 
{

}

function CurrentUserOrders() 
{
    if (!empty($_SESSION["username"])) 
    {

    }
    return null;
}

?>