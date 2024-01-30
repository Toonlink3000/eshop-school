<?php 
namespace Style;

require_once "../utils/config.php";

function Render()
{
    $filename = \Config\GetObject("stylesheet");
    print ("<link rel=\"stylesheet\" href=\"resource.php?$filename\">");
}

?>