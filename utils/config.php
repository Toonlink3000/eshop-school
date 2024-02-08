<?php 
namespace Config;

$g_raw_file = file_get_contents("../config.json");
if ($g_raw_file == false) 
{
    echo "config.json not found";
    exit();
}

$g_file = json_decode($g_raw_file, true);

if ($g_file == null) 
{
    echo "not valid json in convig";
    exit();
}

function GetObject(string $name) 
{
    global $g_file;
    
    return $g_file[$name];
}

function GetRoot() 
{
    global $g_file;
    
    return $g_file;
}

?>