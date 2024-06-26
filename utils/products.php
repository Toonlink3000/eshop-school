<?php 
namespace Products;

require_once "config.php";
require_once "database.php";

\DB\Setup();

function GetProducts() 
{
    $result = \DB\Query("SELECT * FROM Products");

    if ($result == null) 
    {
        echo "error in query";
        return null;
    }

    return $result;
}

// TODO
function GetProductsByCat(string $category)
{
    $category_clean = \DB\Escape($category);
    if ($category_clean == "all") 
    {
        $result = \DB\Query("SELECT * FROM esProducts");
    }
    else 
    {
        $result = \DB\Query("SELECT * FROM esProducts WHERE category LIKE '%|$category_clean|%'");
    }
    
    if ($result == null) 
    {
        echo "error in query - get products";
        return null;
    }

    return $result;
}

function CreateProduct(string $title, string $spec, string $resources, float $price, int $stock, string $category) 
{
    $title_clean = strip_tags(\DB\Escape($title));
    $spec_clean = strip_tags(\DB\Escape($spec));
    $resources_clean = strip_tags(\DB\Escape($resources));
    $category_clean = strip_tags(\DB\Escape($category));

    $result = \DB\Query("INSERT INTO esProducts (id, title, spec, resources, price, stock, category) VALUES (NULL, '$title_clean', '$spec_clean', '$resources_clean', $price, $stock, '$category_clean')");
    return $result;
}

function DeleteProduct(int $id)
{
    $result = \DB\Query("DELETE FROM esProducts WHERE id=$id");
    return $result;
}

function ModifyProduct(int $id, string $title, string $spec, string $resources, float $price, int $stock) 
{
    $title_clean = \DB\Escape($title);
    $spec_clean = \DB\Escape($spec);
    $resources_clean = \DB\Escape($resources);

    $result = \DB\Query("UPDATE esProducts SET title='$title_clean', spec='$spec_clean', resources='$resources_clean', price=$price, stock=$stock WHERE id = $id");
    return $result;
}


function GetProduct(int $id) 
{
    $result = \DB\Query("SELECT * FROM esProducts WHERE id = $id");
    if ($result == false) 
    {
        return false;
    }
    return $result->fetch_assoc();
}
