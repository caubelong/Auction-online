<?php
include_once "lib_admin/database.php";
if(isset($_POST['search_product']) && empty($_POST['name'])){
    $_SESSION['filter_search']=$_POST['search'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <link href="bs4/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/admin.ico"/>
    <style>
        a:hover{
            color: red;
        }
    </style>
</head>
<body>
<?php
$link_img = "upload_img/";
if (isset($_SESSION['new_product_sucsses'])) {
    echo $_SESSION['new_product_sucsses'];
}
?>
<?php
$item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 8;
$current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;
$totalRecords = mysqli_query($db, "SELECT * FROM product");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
$sql = "SELECT * FROM product ";
$sql .= " INNER JOIN category ON product.categoryId=category.categoryId ORDER BY productid DESC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="product_index.php?backhome">Product Manage</a>
        <button class="navbar-toggler" type="button"
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../index_admin.php">Admin Manage<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../category/index_category.php">Category </a>
                </li>
            </ul>
            <form class="form-inline" action="search_product.php?action=search"  method="POST">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit"name="search_product"value="search"></input>
                </form>
        </div>
    </nav>
</div>
<div> &nbsp;</div>
<div class="container-fluid">
    <table class="table">
            <a class="btn btn-warning" style="margin-bottom: 10px;margin-top: -10px" href="../product/new_product.php">New Product </a>
        <thead class="thead-dark">
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Description</th>
            <th>Picture</th>
            <th>&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            while ($row = mysqli_fetch_array($result)):;?>

        <tr>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['Cat_Name']; ?></td>
            <td><?php echo number_format($row['Price'],0,",","."); ?></td>
            <td><?php echo $row['DESCRIPTION']; ?></td>
            <td>
                <div class="text-center">
                    <img class="img-fluid" style="width: 200px;height: 150px"
                         src="<?php echo $link_img . $row['Picture']; ?>"
                </div>
            </td>
            <td>&nbsp;</td>
            <td><a class="btn btn-info" href="<?php echo 'edit_product.php?ProductId=' . $row['ProductId']; ?>">Edit</a></td>
            <td><a class="btn btn-info" href="<?php echo 'delete_product.php?ProductId=' . $row['ProductId']; ?>">delete</a></td>
        </tr>
        <?php endwhile;?>
        </tbody>
    </table>
    <?php
        include './pagination.php';
    ?>
</div>
<br>
<script>
    window.addEventListener('beforeunload', function (e) {
        <?php  $_SESSION['new_product_sucsses']   = '' ?>;
    });
</script>
<script src="/bs4/jquery-3.4.1.min.js"></script>
<script src="/bs4/bootstrap.min.js"></script>
</body>
</html>
