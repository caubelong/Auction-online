<?php
require_once("lib_admin/database.php");
$err = [];
function checkForm()
{
    global $err;
    return count($err) == 0;
}

function formValidate()
{
    global $err;
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
    if($_POST['price']<20000){
        $err[]="price is less than 20000";
    }
}
$link_img = "upload_img/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    formValidate();
    if (checkForm()) {
        $fileName = $_FILES["fileUpload"]['name'];
        $fileTmp_name = $_FILES['fileUpload']['tmp_name'];
        $fileExt = explode(".", $fileName); // cat fileName theo dau cham
        $fileDestination = "upload_img/" . $fileName;
        move_uploaded_file($fileTmp_name, $fileDestination);
        if (empty($_FILES['fileUpload']['name'])) {
            $_FILES['fileUpload']['name'] = $_SESSION['img'];
        }
        $product = [];
        $product['ProductId'] = $_POST['productId'];
        $id_insert=$product['ProductId'];
        $product['name'] = $_POST['name'];
        $product['categoryId'] = $_POST['categoryId'];
        $product['descirption'] = $_POST['description'];
        $product['price'] = $_POST['price'];
        $product['picture'] = $_FILES['fileUpload']['name'];
        $result = update_product($product);
        $_SESSION['new_product_sucsses'] = '<h2>' . 'edit success' . '</h2>';
        if(isset($_FILES['fileUploads'])) {
            $file = $_FILES['fileUploads'];
            $file_name = $file['name'];
            if(!empty($file_name[0])){
                foreach ($file_name as $key => $value) {
                    move_uploaded_file($file['tmp_name'][$key], "upload_img/" . $value);
                }
                foreach ($file_name as $key => $value){
                    if(isset($_SESSION['edit_images_id'])){
                        $id_product=$_SESSION['edit_images_id'];
                        mysqli_query($db,"INSERT INTO images_product(id_product,images)VALUE ('$id_product','$value')");
                        var_dump($id_product);
                    }
                }
            }
        }
        dedirec_to('product_index.php');
    }
} else {
    if (!isset($_GET['ProductId'])) {
        dedirec_to('product_index.php');
    }
    $id = $_GET['ProductId'];
    $_SESSION['new_id_insert_images']=$id;
    $_SESSION['new_id_valid_fix']=$id;
    $sql = "SELECT*FROM product WHERE productId ='" . $id . "'";
    $result = mysqli_query($db, $sql);
    $product = mysqli_fetch_assoc($result);
    $_SESSION['check_picture'] = "edit";
    $_SESSION['img'] = $product['Picture'];
    $_SESSION['edit_images_id']=$id;
    $_SESSION['cat_name'] = $product['CategoryID'];
    $id_insert_product=$_SESSION['new_id_insert_images'];
    $img_id=mysqli_query($db,"SELECT * FROM images_product WHERE id_product = ".$id_insert_product);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="shortcut icon" type="image/png" href="../admin.ico"/>
    <link rel="stylesheet" href="bs4/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        .right-wrap-field{
            float: left;
            width: 75%
        }
        .right-wrap-field img{
            width: 200px;
            border: 1px solid #ccc;
            padding: 5px;
            height: 150px;
        }
        .right-wrap-field input{
            float: none;
        }
        .right-wrap-field ul{
            padding: 0;
            margin: 0;
        }
        .right-wrap-field ul li{
            list-style: none;
            float: left;
            position: relative;
            padding: 0;
            margin: 0;
        }
        .right-wrap-field ul li a{
            background: rgba(0,0,0,0.1);
            color: #000;
            padding: 5px;
            bottom: 3px;
            right: 3px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && !checkForm()): ?>
        <div class="alert alert-danger">
            <strong>Please fix the following errors!</strong>
            <ul>
                <?php
                foreach ($err as $key => $value) {
                    if (!empty($value)) {
                        echo "<li>" . $value . "</li>";
                    }
                }
                if(isset($_SESSION['new_id_valid_fix'])){
                    $id_insert=$_SESSION['new_id_valid_fix'];
                    $sql="SELECT * FROM images_product WHERE id_product = ".$id_insert;
                    $img_id2=mysqli_query($db,$sql);
                }
                ?>
            </ul>
        </div> <?php endif; ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <h3>UPDATE Product</h3>
            <input type="hidden" name="productId"
                   value="<?php echo checkForm() ? $product['ProductId'] : $_POST['productId'] ?>">
            <div class="form-group">
                <label class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" placeholder="product name" name="name"
                           value="<?php echo checkForm() ? $product['NAME'] : $_POST['name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" placeholder="price" name="price"
                           value="<?php echo checkForm() ? $product['Price'] : $_POST['price'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Category </label>
                <select class="form-control" name="categoryId">
                    <?php
                    $result = find_all_category();
                    while ($row = mysqli_fetch_assoc($result)):; ?>
                        <option <?php if ($row['CategoryID'] == $_SESSION['cat_name']) {
                            echo 'selected="selected"';
                        } ?> value="<?php echo $row['CategoryID']; ?>"><?php echo $row['Cat_Name']; ?></option>
                    <?php endwhile; ?>
                    <br><br>
                </select>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-5">
                    <input class="form-control" id="description" type="text" placeholder="description"
                           name="description"
                           value="<?php echo checkForm() ? $product['DESCRIPTION'] : $_POST['description'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Photo Avatar:</label>
                <div class="col-sm-5">
                    <input class="form-control" type="file" name="fileUpload"
                           value="<?php echo checkForm() ? $product['Picture'] : $_POST['Picture'] ?>">
                    <img style="width: 250px;height: 150px" src="<?php echo $link_img . $_SESSION['img']; ?>">
                </div>
            </div>
            <div class="form-group wrap-field">
                <label class="col-sm-2 control-label">Photos desciption :</label>
                <input class="form-control" type="file" multiple="multiple" name="fileUploads[]"
                       value="<?php echo checkForm() ? $product['Picture'] : $_POST['Picture'] ?>">
            </div>
            <div class="right-wrap-field">
                <ul>
                    <?php if(checkForm()){?>
                        <?php foreach ($img_id as $key => $value){?>
                            <div class="col-sm-8 col-lg-4" style="float:left">
                                <img style="height:150px;width: 250px" src="upload_img/<?php echo $value['images']?>" class="img-thumbnail"><br>
                                <button type="submit" class="btn btn-danger"><a href="gallery_delete.php?id=<?= $value['id'] ?>" style=" color: azure;">Xóa</a></button>
                                <br><br>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if($_SERVER["REQUEST_METHOD"] == "POST" && !checkForm()){?>
                        <?php foreach ($img_id2 as $key => $value){?>
                            <div class="col-sm-8 col-lg-4" style="float:left">
                                <img style="height:150px;width: 250px" src="upload_img/<?php echo $value['images']?>" class="img-thumbnail"><br>
                                <button type="submit" class="btn btn-danger"><a href="gallery_delete.php?id=<?= $value['id'] ?>" style=" color: azure;">Xóa</a></button>
                                <br><br>
                            </div>
                        <?php }?>
                    <?php }?>
                    <ul>
            </div>
</div>

</div>
</div>
<div class="container">
    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Sumbit</button> &nbsp; &nbsp; &nbsp; &nbsp;
</div>
</fieldset>
</form>
<a href="product_index.php">Back to Product Index</a>
<script src="bootstrap.min.js"></script>
<script src="jquery-3.4.1.min.js"></script>
</body>
</html>