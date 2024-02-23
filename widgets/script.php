<?php
namespace Script;

function Render() 
{
    echo "<script src=\"resource.php?name=store_application.js\"></script>";
}

function RenderAdmin() 
{
    echo "<script src=\"resource.php?name=store_application.js\"></script>";
    echo "<script src=\"resource.php?name=admin_application.js\"></script>";
}