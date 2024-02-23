<?php 
namespace Style;

require_once "../utils/config.php";

function Render()
{
    $filename = \Config\GetObject("stylesheet");
    print ("<link rel=\"stylesheet\" href=\"resource.php?name=$filename\">");
}

function RenderAdmin()
{
    $filename = \Config\GetObject("stylesheet");
    print ("<link rel=\"stylesheet\" href=\"resource.php?name=$filename\">");
    print ("<link rel=\"stylesheet\" href=\"resource.php?name=admin.css\">");
}

