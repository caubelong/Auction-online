<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>header</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:81/PROJECT_C1908G/svn/admin/Login/product/new_product.php">New Product </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search_product.php?action=search"  method="POST">
                   <label>Tìm kiếm : </label>
                    <input type="text" name="search">
                <input type="submit" name="search_product"value="search">
            </form>
        </div>
    </nav>
</div>
<div></div>
</body>
</html>