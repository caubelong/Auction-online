<?php
require_once ("lib_admin/database.php");
$err = [];
function checkForm()
{
    global $err;
    return count($err) == 0;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['name'])) {
        $err[] = " product name is not empty";
    }
    if (empty($_POST['price'])) {
        $err[] = "price is not empty";
    }
    if (empty($_POST['categoryId'])) {
        $err[] = "categoryId is not empty";
    }
    if (empty($_POST['description'])) {
        $err[] = "description is not empty";
    }
    if (!is_numeric($_POST['price'])) {
        $err[] = "price is not text";
    }
    if(empty($_FILES['fileUpload']['tmp_name'])){
        $err[]="images is not empty";
    }
    if($_POST['price']<20000){
        $err[]="price is less than 20000";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Product</title>
    <link href="bs4/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/admin.ico"/>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="product_index.php?backhome">Product Manage</a>
        <button class="navbar-toggler" type="button"
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/index_admin.php">Admin Manage<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/category/index_category.php">Category </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div></div>
<?php if ($_SERVER['REQUEST_METHOD'] == "POST" && !checkForm()): ?>
    <div class="container-fluid">
        <div class="alert alert-danger">
            <span class="err">fix loi sau de tiep tuc</span>
            <ul>
                <?php
                foreach ($err as $key => $value) {
                    if (!empty($value)) {
                        echo "<li>" . $value . "</li>";
                    }
                }
                ?>
            </ul>
        </div> <?php endif; ?>
    </div>
<div class="container-fluid">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name : </label>
            <input type="text" class="form-control" placeholder="product name" name="name"
                   value="<?php echo checkForm() ? "" : $_POST['name'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price : </label>
            <input type="text" class="form-control" placeholder="price" name="price"
                   value="<?php echo checkForm() ? "" : $_POST['price'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category :</label>
            <select class="form-control" name="categoryId">
                    <?php
                    $result =find_all_category();
                    while($row=mysqli_fetch_array($result)):; ?>
                        <option value="<?php echo $row[0];?>" ><?php echo $row[1];?></option>
                    <?php endwhile; ?>
                <br><br>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description :</label>
            <input class="form-control" rows="3" placeholder="description" name="description"
                     value="<?php echo checkForm() ? "" : $_POST['description'] ?>"></input>
        </div>
        <label for="exampleFormControlFile">Photo Avatar : </label>
        <input type="file" class="btn btn-outline-info" name="fileUpload">
        <label for="exampleFormControlFile1">Photo description: </label>
        <input type="file" class="btn btn-outline-info" name="fileUploads[]" multiple="multiple">
        <div class="form-group">
            <input name="submit" class="btn btn-outline-info" value="submit" type="submit">
        </div>
    </form>
</div>
<?php if ($_SERVER['REQUEST_METHOD'] == "POST" && checkForm()): ?>
    <?php
    $link_img="upload_img/";
    $_product = [];
    $_product['name'] = mysqli_real_escape_string($db, $_POST['name']);
    (float)$_product['price'] = mysqli_real_escape_string($db, $_POST['price']);
    $_product['description'] = mysqli_real_escape_string($db, $_POST['description']);
    $_product['categoryId']=$_POST['categoryId'];
    $_product['fileUpload']=$_FILES["fileUpload"]['name'];
    $fileTmp_name=$_FILES['fileUpload']['tmp_name'];
    $fileDestination="upload_img/".$_product['fileUpload'];
    move_uploaded_file($fileTmp_name,$fileDestination);
    $result=insert_product($_product);
    $id_product=$_SESSION['insert_id_picture_product'];
    echo "<h3>" . "Crete new product Name :" .$_product['name']  . " price : ".number_format($_product['price'], 0, ",", "."). "</h3>";
    echo mysqli_error($db);
    if(isset($_FILES['fileUploads'])) {
    $file = $_FILES['fileUploads'];
    $file_name = $file['name'];
    foreach ($file_name as $key => $value) {
        move_uploaded_file($file['tmp_name'][$key], "upload_img/" . $value);
    }
    foreach ($file_name as $key => $value){
        mysqli_query($db,"INSERT INTO images_product(id_product,images)VALUE ('$id_product','$value')");
    }
}
endif; ?>
<a href="product_index.php">Back to index</a>
<img src="">
</body>
<script src="bs4/jquery-3.4.1.min.js"></script>
<script src="bs4/bootstrap.min.js"></script>
</html>