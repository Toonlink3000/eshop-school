<?php 
namespace TopBar;

require_once("../widgets/config.php");

function TPrint() 
{
    print (
        "<div class=\"topbar\">\n"
    );

    // logo
    $logo = \Config\GetSubData("logo");
    print (
        "<img id=\"logo\" src=\"resource.php?name=$logo\" alt=\"logo\">\n"
    );

    $data = \Config\GetSubData("topbar");

    foreach ($data as $key => $value) {
        print (
            "<a href=\"$value\">$key</a>\n"
        );
    }

    print (
        "</div>\n"
    );
}

?>