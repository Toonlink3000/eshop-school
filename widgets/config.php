<?php 
namespace Config;

function GetConfig() 
{
    $file = file_get_contents("../config/website.json");
    $data = json_decode($file, true);
    return $data;
}

function GetSubData($name) 
{
    $file = file_get_contents("../config/website.json");
    $data = json_decode($file, true);
    return $data[$name];
}

?>