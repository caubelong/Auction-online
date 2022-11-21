<?php
require_once('database.php');
require_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //db delete
    delete_category($_POST['id']);
    redirect_to('index_category.php');
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('index_category.php');
    }
    $id = $_GET['id'];
    $category = find_category_by_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete Category</title>
    <style>
        .label {
            font-weight: bold;
            font-size: large;
        }
    </style>
    <link rel="stylesheet" href="bs4/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
</head>
<body>
<div class="container">
<div class="alert alert-danger">
    <h1>Delete Category</h1>
    <h2>Are you sure you want to delete this category?</h2>
    <p><span class="label">Name: </span><?php echo $category['Cat_Name']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $category['CategoryID']; ?>" >
        <button type="submit" class="btn btn-info"> Delete Category</button> 
     
    </form>
    </div>
    </div>
    <br><br>
    <a href="index_category.php">Back to index</a>
    <script src="bootstrap.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>