<?php 
namespace TopBar;

require_once "../utils/config.php";

function Render() 
{
    echo "<div class='topbar'>";
    //echo "<div id=\"webtitle\">SlaveTrade-24/7</div>";
    $items = \Config\GetObject("topbar");

    foreach ($items as $item => $link) 
    {
        echo "<a href='" . $link . "'>" . $item . "</a>";
    }

    echo "</div>";
}