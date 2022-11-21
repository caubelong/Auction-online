<?php
require_once('database.php');
require_once('functions.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_Admin($_POST['id']);
    redirect_to('index_admin.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('index_admin.php');
    }
    $id = $_GET['id'];
    $Category = find_Admin_by_id($id);
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
    <link rel="shortcut icon" type="image/png" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/admin.ico"/>
    <link rel="stylesheet" href="bs4/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
</head>
<body>
<div class="container">
<div class="alert alert-danger">
    <h1>Delete Admin</h1>
    <h2>Are you sure you want to delete this Admin?</h2>
    <p><span class="label">Name: </span><?php echo $Category['Name']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $Category['id']; ?>" >
     
        <button type="submit" class="btn btn-info"> Delete Admin</button>
        <div style="margin-top: 10px"> <a href="index_admin.php">Back to index admin</a></div>
     
    </form>
    </div>
    </div>
    <br><br>
    <script src="bootstrap.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>