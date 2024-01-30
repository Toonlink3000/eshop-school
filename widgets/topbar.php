<?php 
namespace TopBar;

require_once "../utils/config.php";

function Render() 
{
    echo "<div class='topbar'>";

    $items = \Config\GetObject("topbar");

    foreach ($items as $item => $link) 
    {
        echo "<a href='" . $link . "'>" . $item . "</a>";
    }

    echo "</div>";
}

?>
