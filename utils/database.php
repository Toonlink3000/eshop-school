<?php 
namespace DB;

require_once "config.php";

$g_database = null;
$is_setup = false;

function Setup() 
{
    global $g_database;
    global $is_setup;

    if ($is_setup === true) 
    {
        return;
    }
    $dbinf = \Config\GetObject("database");
    Connect($dbinf["hostname"], $dbinf["username"], $dbinf["password"], $dbinf["database"]);

    if ($g_database == null) 
    {
        echo "database not connected";
        return;
    }
    $tab = Query("CREATE TABLE IF NOT EXISTS esProducts (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255) NOT NULL, spec VARCHAR(255) NOT NULL, resources VARCHAR(255), price FLOAT NOT NULL, stock INT NOT NULL, category VARCHAR(255) NOT NULL)");
    if (!$tab) 
    {
        echo "error in query - products table creation";
        var_dump($tab);
        return;
    }

    if (!Query("CREATE TABLE IF NOT EXISTS esUsers (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255), pass VARCHAR(255), userimage VARCHAR(255) NOT NULL, addr VARCHAR(255), elevation INT)")) 
    {
        echo "error in query - user table creation";
        return;
    }

    if (!Query("CREATE TABLE IF NOT EXISTS esOrders (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, product INT NOT NULL, user INT NOT NULL, addr VARCHAR(255) NOT NULL, stat VARCHAR(255) NOT NULL)")) 
    {
        echo "error in query - orders table creation";
        return;
    }

    if (!Query("CREATE TABLE IF NOT EXISTS esImages (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, title INT NOT NULL, owner_id INT NOT NULL, refcount INT NOT NULL)")) 
    {
        echo "error in query - orders table creation";
        return;
    }

    $is_setup = true;
}

function Connect(string $hostname, string $username, string $password, string $database) 
{
    global $g_database;

    $g_database = new \mysqli($hostname, $username, $password, $database);
}

function Query(string $query) 
{
    global $g_database;

    if ($g_database == null) 
    {
        echo "database not connected";
        return null;
    }

    return $g_database->query($query);
}

function GetConnection() 
{
    global $g_database;

    return $g_database;
}

function Escape(string $input) 
{
    global $g_database;

    return $g_database->real_escape_string($input);
}
