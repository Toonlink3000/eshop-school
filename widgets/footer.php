<?php 
namespace Footer;
require_once "../utils/config.php";

function Render() 
{
    echo "<div id=\"footer\">";
    echo "<div class=\"footeritem\">" . \Config\GetObject("author") . " " . \Config\GetObject("copydate") . "</div>";
    echo "</div>";
}