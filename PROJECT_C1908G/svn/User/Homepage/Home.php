<?php
require_once("database.php");
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Action Price</title>
        <!--Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">
        <!--Font Awesome CDN -->
        <script src="https://kit.fontawesome.com/4dd413be3a.js" crossorigin="anonymous"></script>
        <!--Custom Stylesheet-->
        <link rel="stylesheet" href="../CSS/style.css">
        <!--GG Font-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <style>
            .box{
     
     position: relative;
          
     overflow: hidden;
          
     box-shadow: 0 0 5px #808080;
      
     }
     .box:before,
     .box:after{
     content: "";
     width: 0;
     height: 0;
     position: absolute;
     opacity: 0;
     z-index: 1;
     transition: all 0.5s ease 0s;
     }
     .box:hover:before,
     .box:hover:after{
     opacity: 1;
     }
     .box{    
     height: auto;
     transform: scale(1);
     transition: all 0.5s ease 0s;
     }
     .box:hover {
     transform: scale(1.05);
     }
        </style>
    </head>

    <body>
    <?php
         $link_img =('/PROJECT_C1908G/svn/admin/login/product/upload_img/');
    ?>
    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-black " id="my_nav">
        <div class="container" class="row">
            <div class="col-md-2">
                <a href="Home.php" class="navbar-brand" style="color:#fff"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;Auctions Table</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse col-md-10" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="Home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Product
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                 style=" background-color:black">
                                <?php
                                $category_set = find_all_categorys();
                                $count = mysqli_num_rows($category_set);
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($db, $sql);
                                $count = mysqli_num_rows($result);
                                for ($i = 0; $i < $count; $i++):
                                    $category = mysqli_fetch_assoc($category_set);
                                    ?>
                                    <a class="dropdown-item"
                                       href="Category.php?Id=<?php echo $category['CategoryID']; ?>"><?php echo $category['Cat_Name']; ?></a>
                                <?php
                                endfor;
                                mysqli_free_result($category_set);
                                ?>
                            </div>
                        </div>
                    </li>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="ml-3">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 amber-border col-md-10" type="text" placeholder="Search" name="search" aria-label="Search">
                            <div class="input-group-append">
                        <button type="submit"name="search_product" value="search" id="basic-text1"class="btn btn-secondary"><i class="fas fa-search text-grey"
                            aria-hidden="true" style="width:50px"></i></button>
                            </div>
                        </div>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-2x"></i></a>
                        <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdownMenuLink">
                            <?php if(isset($_SESSION['login_action'])) {?>
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="logout_php.php">Logout</a>
                                <a class="dropdown-item" href="register.php" hidden>SingUp</a>
                            <?php }else{?>
                                <a class="dropdown-item" href="login_user.php">Login</a>
                                <a class="dropdown-item" href="logout_php.php" hidden>Logout</a>
                                <a class="dropdown-item" href="register.php">SingUp</a>
                            <?php }?>
                        </div>
                    </li>
                    <li classa="nav-item active">
                    <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--End Nav-->
    <section id="main" class="mb-5">
        <div id="Carousel" class="carousel Slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                <li data-target="#Carousel" data-slide-to="1"></li>
                <li data-target="#Carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-image-1 active">
                    <img src="../IMG/1.jpg" alt="" class="slide">
                    <div class="container">
                        <div class="carousel-caption col-xs d-sm-block text-right mb-5" id="carou1">
                            <h1 class="display-3 title-color">Title One</h1>
                            <p class=" lead">Write content here </p>
                            <a href="#" class="btn btn-color slide-btn btn-lg">Sign Up Now</a>
                        </div>
                    </div>
                </div>
                <!--End 1-->
                <div class="carousel-item carousel-image-2 ">
                    <img src="../IMG/2.jpg" alt="" class="slide">
                    <div class="container">
                        <div class="carousel-caption  d-sm-block text-right mb-5">
                            <h1 class="display-3 title-color">Title Two</h1>
                            <p class="lead">Write content here</p>
                            <a href="#" class="btn btn-color slide-btn btn-lg">Learn More</a>
                        </div>
                    </div>
                </div>
                <!--End 2-->
                <div class="carousel-item carousel-image-3 ">
                    <img src="../IMG/3.jpg" alt="" class="slide">
                    <div class="container">
                        <div class="carousel-caption  d-sm-block text-right mb-5">
                            <h1 class="display-3 title-color">Title Three</h1>
                            <p class="lead">Write content here</p>
                            <a href="#" class="btn btn-color slide-btn btn-lg">Bid Now</a>
                        </div>
                    </div>
                </div>
                <!--End 3-->
                <a href="#Carousel" data-slide="next" class="carousel-control-prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#Carousel" data-slide="next" class="carousel-control-next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>
    <div class="container menubg">
        <!-- Nav tabs -->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="navbar navbar-expand-sm">
            <div class="container">
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item ">
                        <a href="Home.php" class="nav-link">
                            <p>All Categlory</p>
                        </a>
                    </li>
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    <?php
                    $category_set = find_all_categorys();
                    $count = mysqli_num_rows($category_set);
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($db, $sql);
                    $count = mysqli_num_rows($result);
                    for ($i = 0; $i < $count; $i++):
                        $category = mysqli_fetch_assoc($category_set);
                        ?>

                        <li class="nav-item ">
                            <a href="Category.php?Id=<?php echo $category['CategoryID']; ?>" class="nav-link">
                                <p><?php echo $category['Cat_Name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p></a>
                        </li>

                    <?php
                    endfor;
                    mysqli_free_result($category_set);
                    ?>
                </ul>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane container active" id="vehicle">
                <section id="products" class="products py-5">
                    <div class="container">
                            <div class="text-center">
                                <h1 class="text-capitalize product-title">All products are being auctioned</h1>
                                <?php if(isset($_POST['search_product'])&&empty($_POST['search'])):?>
                                <br>
                                <h5>No products</h5>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="product-items">
                        <?php
                        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
                        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($current_page - 1) * $item_per_page;
                        $totalRecord = mysqli_query($db, "SELECT * FROM product");
                        $totalRecord = $totalRecord->num_rows;
                        $total_pages = ceil($totalRecord / $item_per_page);
                        ?>
                        <?php if (!isset($_POST['search_product'])) { ?>
                            <?php
                            $sql = "SELECT * FROM product ORDER BY productId DESC";
                            $sql .= " LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                            $result = mysqli_query($db, $sql);
                            $count = mysqli_num_rows($result);
                            for ($i = 0; $i < $count; $i++):
                                $product = mysqli_fetch_assoc($result);
                               
                                ?>
                                <div class="col-sm-8 col-lg-4 ">
                                    <div class="card single-item" >
                                        <div class="img-container box">
                                            <a href="Info.php?id=<?php echo $product['ProductId']; ?>"> <img
                                                        src="<?php echo $link_img . $product['Picture'] ?>" alt=""
                                                        class="card-img-top product-img" style="height: 300px"></a>
                                        </div>
                                        <div class="card-body title">
                                            <div class="card-text d-flex justify-content-between text-capitalize">
                                                <h5 id="item-name"><a
                                                            href="Info.php?id=<?php echo $product['ProductId']; ?>"><?php echo $product['NAME'] ?>
                                                </h5>
                                                <span> <i class="fas fa-dollar-sign"></i><?php echo number_format($product['Price'], 0, ",", "."); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php } elseif(isset($_POST['search_product'])&&!empty($_POST['search'])) { ?>
                            <?php
                            $name_search = $_POST['search'];
                            $sql = "SELECT * FROM product";
                            $sql .= " INNER JOIN category ON product.categoryId=category.categoryId";
                            $sql .= " WHERE NAME LIKE '%" . $name_search . "%'";
                            $sql .= "OR cat_name='" . $name_search . "'";
                            $result = mysqli_query($db, $sql);
                            $count = mysqli_num_rows($result);
                            for ($i = 0; $i < $count; $i++):
                                $search = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-8 col-lg-4" style="margin-top: 20px;">
                                    <div class="card single-item">
                                        <div class="img-container box">
                                            <a href="Info.php?id=<?php echo $search['ProductId']; ?>"> <img
                                                        src="<?php echo $link_img . $search['Picture'] ?>" alt=""
                                                        class="card-img-top product-img" style="height: 400px"></a>
                                        </div>
                                        <div class="card-body title">
                                            <div class="card-text d-flex justify-content-between text-capitalize">
                                                <h5 id="item-name"><a
                                                            href="Info.php?id=<?php echo $search['ProductId']; ?>"><?php echo $search['NAME'] ?>
                                                </h5>
                                                <span> <i class="fas fa-dollar-sign"></i><?php echo number_format($search['Price'], 0, ",", "."); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php } ?>
                    </div>
            </div>
        </div>
        <div>
        <?php if(!isset($_POST['search_product'])) {?>
        <div class="pagination">
            <?php include_once "pagination.php"; ?>
        </div>
    <?php }else{?>
    <div></div>
    <?php }?>
    </div>
    <footer class="footer">
        <div class="footer-copyright text-center py-3">
            <div class="row">
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">PROJECTS</a>
                        </li>
                        <li>
                            <a href="contact.php">CONTACT</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Adress</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        </li>
                        <li>
                            <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        </li>
                        <li>
                            <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>
                    <a type="button" class="btn-floating btn-fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-tw">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a type="button" class="btn-floating btn-gplus">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    <a type="button" class="btn-floating btn-dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3 " >© 2020 Copyright:
            <a href="#"> Auctions Online.com</a>
        </div>
        <?php echo $_SESSION['user_name']?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    </body>
    </html>
<?php
db_disconnect($db);
?>