<?php 
namespace TopBar;

require_once "../utils/config.php";
require_once "../utils/user.php";
require_once "user_dropdown.php";

function Render() 
{
    echo "<div class='topbar'>";
    //echo "<div id=\"webtitle\">SlaveTrade-24/7</div>";
    $items = \Config\GetObject("topbar");

    foreach ($items as $item => $link) 
    {
        echo "<a href='" . $link . "'>" . $item . "</a>";
    }

    $greeting = \Config\GetObject("greeting");
    $username = \User\CurrentUsername();
    echo "<a class=\"right\" onclick=\"ToggleUser()\">$greeting$username</a>";
    echo "<a id=\"basketbutton\" class=\"right\" onclick=\"ShowBasket()\">Basket</a>";

    echo "</div>";

    RenderBasketContainer();
    \UserDropdown\Render();
}

function RenderBasketContainer() 
{
    echo "<div id=\"basketcontainer\" hidden></div>";
}