<?php 
namespace TopBar;

require_once "../utils/config.php";
require_once "../utils/user.php";

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
    RenderUserDropdown();
}

function RenderBasketContainer() 
{
    echo "<div id=\"basketcontainer\" hidden></div>";
}

function RenderUserDropdown() 
{
    echo "<div id=\"user_dropdown\" style=\"display: none;\">";
    if (\User\CurrentElevation() == 1) // neni admin
    {
        $items = \Config\GetObject("userbuttons");

        foreach ($items as $item => $link) 
        {
            echo "<a class=\"user_button\" href='" . $link . "'>" . $item . "</a>";
        }
    }
    elseif (\User\CurrentElevation() == 10) // full administrator
    {
        $items = \Config\GetObject("adminbuttons");

        foreach ($items as $item => $link) 
        {
            echo "<a class=\"user_button\" href='" . $link . "'>" . $item . "</a>";
        }
    }
    else // neni prihlaseny...
    {
        $logthing = \Config\GetObject("loginprompt");
        $usernameprompt = \Config\GetObject("usernameprompt");
        $passwordprompt = \Config\GetObject("passwordprompt");

        echo "<h4 class=\"login_title\">$logthing</h4>";
        echo "<form class=\"login_box\" method=\"POST\" action=\"login.php\">";
        echo 
        "
        <label>$usernameprompt</label>
        <input type=\"text\" name=\"username\"><br>
        
        <label>$passwordprompt</label>
        <input type=\"password\" name=\"password\"><br>
        <button type=\"submit\">Login</button>
        ";
        echo "</form>";
    }
    echo "</div>";
}