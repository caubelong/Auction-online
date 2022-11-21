<?php
require_once("database.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Action Price</title>
  <!--Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!--Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/4dd413be3a.js" crossorigin="anonymous"></script>
  <!--Custom Stylesheet-->
  <link rel="stylesheet" href="../CSS/style.css">
  <!--GG Font-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
        margin-top: 20px;
        margin-right:10px
    }
    .right-wrap-field ul li a{
        background: rgba(0,0,0,0.1);
        color: #000;
        padding: 5px;
        bottom: 3px;
        right: 3px;
        margin-top: 10px;
    }
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
     width: 90%;
     height: 90%;
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
                    <li class="nav-item active col-md-3">
                        <a href="Home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
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
          <nav class="navbar navbar-expand-sm navbar-dark">
          <div class="container">
          <ul class="nav nav-tabs nav-fill">
          <li class="nav-item ">
          <a  href="Home.php" class="nav-link">
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
                      <a href="Category.php?Id=<?php echo $category['CategoryID']; ?>" class="nav-link"><p><?php echo $category['Cat_Name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p></a>
                </li>
               
                <?php
        endfor;
        mysqli_free_result($category_set);
        ?>
         </ul>
      </div>
      </nav>
          <!-- Tab panes -->
          <div class="tab-content">
          <div class="tab-pane container active" id="vehicle">
          <section id="products" class="products py-5">
          <div class="container">
            <div class="row">
              <div class="col-10 mx-auto col-sm-6 text-center">
                <h1 class="text-capitalize product-title">Product details</h1>
              </div>
            </div>
              </div>
            <br><br>
            <!--End of section title -->
            <!-- Products items -->
              <?php
              $err=[];
              function checkForm(){
                  global $err;
                  return count($err) == 0;
              }
              ?>
              <?php 
              
              if($_SERVER['REQUEST_METHOD'] =="POST"){
                
                  if(empty($_POST['price_dau_gia'])){
                      $err[]="Please enter the amount you want to pay for the product";
                  }
                  if(!is_numeric($_POST['price_dau_gia'])){
                      $err[]="Please enter number ";
                  }
                  
              }
              ?>
            <?php
            $sql = "SELECT * FROM product";
            $sql.=" INNER JOIN category ON product.categoryId=category.categoryId";
            $sql.= " WHERE productid = ".$_GET['id'];
            $img_id=mysqli_query($db,"SELECT * FROM images_product WHERE id_product =".$_GET['id']);
            $result = mysqli_query($db, $sql);
            $product = mysqli_fetch_assoc($result);
                ?>
              <?php if($_SERVER['REQUEST_METHOD']=="POST" && !empty( $_SESSION['price_auction']) &&checkForm() && isset($_SESSION['login_action'])):?>
                  <?php
                  $sql="DELETE FROM auction WHERE id_product =".$_GET['id']." AND user_id=".$_SESSION['user_id']."";
                  $query=mysqli_query($db,$sql);
              endif; ?>
              <?php if($_SERVER['REQUEST_METHOD']=="POST" && checkForm() && isset($_SESSION['login_action'])):?>
                  <?php
                  $action = [];
                  $action['price_action']=$_POST['price_dau_gia'];
                  $sql = "INSERT INTO auction(id_product,user_id,price_auction)";
                  $sql .= "VALUES(";
                  $sql .= "'" .$_GET['id'] . "',";
                  $sql .= "'" . $_SESSION['user_id'] . "',";
                  $sql .= "'" . $action['price_action'] . "'";
                  $sql .= ")";
                  $result=mysqli_query($db,$sql);
                 
                  mysqli_error($db);
              endif;?>
              <?php if(isset($_SESSION['login_action'])) {
                  $sql = "select * from auction where user_id=" . $_SESSION['user_id'] . " AND id_product=" . $_GET['id'] . "";
                  $query = mysqli_query($db, $sql);
                  $row = mysqli_fetch_assoc($query);
                  $_SESSION['price_auction'] = $row['price_auction'];
              }?>
                <div class="container">
                    <div class="row" id="product-items">
                    <div class="col-md-6">
                    <img class="box" src="<?php echo $link_img .$product['Picture']; ?>" style="width: 400px;height: 300px">
                    </div>
                    <div class="col-md-6">
                    <h2>Product portfolio : <?php echo $product['Cat_Name']; ?></h2>
                        <p>Product's name: <?php echo $product['NAME']; ?></p>
                        <p>Price : <span><i class="fas fa-dollar-sign"></i> <?php echo number_format($product['Price'],0,",","."); ?></span></p>
                        <p>Description: <?php echo $product['DESCRIPTION']; ?></p>
                        
                        <p>Your price paid: <span><i class="fas fa-dollar-sign"></i> <?php echo isset($_SESSION['login_action']) ? number_format($row['price_auction'],0,",",".") : 0 ?></span></p>
                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
                            <label>The price paid for the product : </label>
                            <input type="text" name="price_dau_gia" value="" placeholder="Enter a price for the product" class="form-control">
                            <button type="submit" name="tra_gia" value="tra_gia" class="btn btn-outline-warning"><i class="fa fa-gavel" aria-hidden="true"></i>Auctions</button>
                        </form>
                        <?php if($_SERVER['REQUEST_METHOD']=="POST" && !checkForm()):?>
                          <div class="alert alert-danger">
                            <span>
                                <ul>
                                    <?php
                                    foreach ($err as $key=> $value){
                                        echo "<li>".$value."</li>";
                                    }
                                        ?>
                                </ul>
                            </span>
                        </div><?php endif;?>
                        <br>
                        <?php
                        if(isset($_SESSION['login_action'])){
                              echo "";
                            }else{
                            echo "<h4>Sign in to enter the auction!!</h4>";
                            }
                            ?>
                    </div>
                    <div class="form-group wrap-field">
                        <div class="col-md-12" style="margin-top: 10px">Photo description :</div>
                    <div class="right-wrap-field col-md-12">
                        <ul>
                            <?php foreach ($img_id as $key => $value){?>
                                <li>
                                    <img class="box"src="<?php echo $link_img?><?php echo $value['images']?>">
                                </li>
                            <?php }?>
                            <ul>
                    </div>
                </div>
                </div>
                </div>
                </div>
              </div>
          </div>
              <!-- Footer -->
<footer class="footer">
    <div class="footer-copyright text-center py-3">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
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
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
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
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
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
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 " >© 2020 Copyright:
        <a href="#">Auction Online.com</a>
    </div>
    <!-- Copyright -->
</footer>
              <!-- Footer -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<?php
db_disconnect($db);
?>