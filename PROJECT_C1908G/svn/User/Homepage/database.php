<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "project1");
session_start();
function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

/******
 * Open connection to database
 */
$db = db_connect();
function dedirec_to($location)
{
    header("location:" . $location);
    exit;
}
function confirm_query_result($result){
  global $db;
  if (!$result){
      echo mysqli_error($db);
      db_disconnect($db);
      exit; //terminate php
  } else {
      return $result;
  }
}

function db_disconnect($connection) { //call at the end of each page
    if(isset($connection)) {
      mysqli_close($connection);
    }
}
function find_all_categorys(){
  global $db;
  $sql = "SELECT * FROM Category ";
  $sql .= "ORDER BY categoryid";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}

function find_category_by_id($id) {
global $db;
$sql = "SELECT * FROM Category ";
$sql .= "WHERE CategoryId='" . $id . "'";
$result = mysqli_query($db, $sql);
confirm_query_result($result);
$category = mysqli_fetch_assoc($result);
mysqli_free_result($result);
return $category; // returns an assoc. array
}
function insert_user($user){
    global $db;
    $sql = "INSERT INTO user(user_name,password,full_name,email)";
    $sql .= "VALUES(";
    $sql .= "'" . $user['User_name'] . "',";
    $sql .= "'" . $user['Password'] . "',";
    $sql .= "'" . $user['fullname'] . "',";
    $sql .= "'" . $user['Email']. "'";
    $sql .= ")";
    $result=mysqli_query($db,$sql);
    return confirm_query_result($result);
}
?>