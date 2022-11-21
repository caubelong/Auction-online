<?php
require_once ("lib_admin/database.php");

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $pro_id=$_POST['productId'];
    $sql="DELETE FROM auction WHERE `id_product`=".$pro_id;
    $qr=mysqli_query($db,$sql);
    $result=delete_product($pro_id);
    $result=mysqli_query($db,"DELETE FROM images_product WHERE `id_product`=".$pro_id);
    $_SESSION['new_product_sucsses'] = '<h2>'.'delete success'.'</h2>';
    dedirec_to('product_index.php');
} else {
    if(!isset($_GET['ProductId'])) {
        dedirec_to('product_index.php');
    }
    $id = $_GET['ProductId'];
    $sql="SELECT*FROM product WHERE productId ='".$id."'";
    $result = mysqli_query($db,$sql);
    $product=mysqli_fetch_assoc($result);
}

?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Delete Book</title>
        <style>
            .label {
                font-weight: bold;
                font-size: large;
            }
        </style>
        <link rel="shortcut icon" type="image/png" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/admin.ico"/>
    </head>
    <link rel="stylesheet" href="bs4/bootstrap.min.css">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
    <body>
    <div class="container">
<div class="alert alert-danger">
    <?php $_SESSION['check_action'] = ''; ?>
    <h1>Delete Product</h1>
    <h2>Are you sure you want to delete this product?</h2>
    <p><span class="label">Product Name: </span><?php echo $product['NAME']; ?></p>
    <p><span class="label">Price: </span><?php echo $product['Price']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <input type="hidden" name="productId" value="<?php echo $product['ProductId']; ?>" >

        <button type="submit" class="btn btn-info"> Delete Product</button>
        <div style="margin-top: 10px"><a href="product_index.php">Back to Product Index</a>

    </form>
    </div>
    </div>
    <br><br>
    <script src="bootstrap.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    </body>
    </html>

