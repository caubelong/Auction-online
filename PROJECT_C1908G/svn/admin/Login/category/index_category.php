<?php

require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Category</title>
    <style>
        table {
        border-collapse: collapse;
        vertical-align: top;
        }

        table.list {
        width: 80%;
        }

        table.list tr td {
        border: 1px solid #999999;
        
        }

        table.list tr th {
        border: 1px solid #000;
        background: #A8D4FF;
        color: white;
        text-align: left;
        }
    </style>
    <link href="bs4/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index_category.php">Category Manage</a>
        <button class="navbar-toggler" type="button"
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../index_admin.php">Admin Manage <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../product/product_index.php  ">Product </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div> &nbsp;</div>
<div class="container-fluid">
    <a class="btn btn-warning" style="margin-bottom: 10px;margin-top: -10px" href="../category/new.php">New Category </a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>&nbsp;&nbsp;</th>
        </tr>
        </thead>
        </tr>

        <?php
        $category_set = find_all_categorys();
        $count = mysqli_num_rows($category_set);
        for ($i = 0; $i < $count; $i++):
            $category = mysqli_fetch_assoc($category_set);
            ?>
            <tr>
                <td><?php echo $category['CategoryID']; ?></td>
                <td><?php echo $category['Cat_Name']; ?></td>
                <td><a class="btn btn-info" href="<?php echo 'edit.php?id='.$category['CategoryID']; ?>">Edit</a></td>
                <td><a class="btn btn-info" href="<?php echo 'delete.php?id='.$category['CategoryID']  ; ?>">Delete</a></td>
            </tr>
        <?php
        endfor;
        mysqli_free_result($category_set);
        ?>
    </table>

</body>
<script src="bs4/bootstrap.min.js"></script>
<script src="bs4/jquery-3.4.1.min.js"></script>
</html>
<?php
db_disconnect($db);
?>