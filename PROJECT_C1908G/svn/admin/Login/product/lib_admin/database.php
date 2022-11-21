<?php
session_start();
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "project1";
$db = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
function dedirec_to($location)
{
    header("location:" . $location);
    exit;
}

function confirm_query_result($result)
{
    global $db;
    if (!$result) {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    } else {
        return $result;
    }
}

function find_all_category()
{
    global $db;
    $sql = "SELECT * FROM category ";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}
function insert_product($_product){
    global $db;
    $sql = "INSERT INTO product(NAME,DESCRIPTION,CategoryID,Price,Picture)";
    $sql .= "VALUES(";
    $sql .= "'" . $_product['name'] . "',";
    $sql .= "'" . $_product['description'] . "',";
    $sql .= "'" . $_product['categoryId'] . "',";
    $sql .= "'" . $_product['price'] . "',";
    $sql .= "'" .  $_product['fileUpload'] . "'";
    $sql .= ")";
    $result=mysqli_query($db,$sql);
    $_SESSION['insert_id_picture_product']=mysqli_insert_id($db);
    return confirm_query_result($result);
}
function delete_product($pro_id){
    global $db;
    $sql = "DELETE FROM product ";
    $sql .= "WHERE productId='" .$pro_id. "' ";
    $result=mysqli_query($db,$sql);
    return confirm_query_result($result);
}
function update_product($product){
    global $db;
    $sql = "UPDATE product SET ";
    $sql .= "name='" . $product['name'] . "', ";
    $sql .= "price='" . $product['price'] . "', ";
    $sql .= "categoryId='" . $product['categoryId'] . "', ";
    $sql .= "description='" . $product['descirption'] . "', ";
    $sql .= "picture='" . $_FILES['fileUpload']['name']. "', ";
    $sql .= "price='" . $product['price'] . "'";
    $sql .= "WHERE productId='" . $product['ProductId'] . "' ";
    $sql .= "LIMIT 1";
    $result=mysqli_query($db,$sql);
    return confirm_query_result($result);
}
?>
