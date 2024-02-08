<?php 
namespace BoxDisplay;

function Render(string $content) 
{
    echo "<div class=\"boxdisplay\">$content</div>";
}

function RenderLinked(string $content, string $link) 
{
    echo "<div class=\"boxdisplay\" onclick='$link'>$content</div>";
}