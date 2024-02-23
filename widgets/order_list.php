<?php

namespace OrderList;
require_once "../utils/orders.php";
require_once "../utils/products.php";

function Render() 
{
    $orders = \Order\GetUserOrders();
    while ($order = $orders->fetch_assoc()) 
    {
        $prod = \Products\GetProduct($order["product"]);
        $name = $prod["title"];
        $status = $order["stat"];
        echo"<div>$name | Status: $status</div>";
    }
}