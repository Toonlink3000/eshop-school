<?php
namespace UserDropdown;

require_once "../utils/user.php";
require_once "../utils/config.php";

function Render() 
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