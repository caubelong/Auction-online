<?php
require_once('database.php');
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['Name'])){
        $errors[] = 'Name Title is required';
    }
    if (empty($_POST['Password'])){
        $errors[] = 'Password is required';
    }

    if (empty($_POST['Email'])){
        $errors[] = 'Email is required';
    }
    if (empty($_POST['fullname'])){
        $errors[] = 'full name is required';
    }
    if(!filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email is required';
    }
}

?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Create User</title>
        <style>
            label{
            color: #fff;
        }
        
        .error {
            color: #FF0000;
        }
        div.error{
            border: thin solid red;
            display: inline-block;
            padding: 5px;
        }
        body{
            background: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.6)),url('../IMG/vai.gif');
            background-size: cover;
  
            }
            form{
            background: linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('../IMG/vai.gif');
            background-size: cover;
                
            }
        </style>
        <link rel="stylesheet" href="../JS/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!--Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/4dd413be3a.js" crossorigin="anonymous"></script>
  <!--Custom Stylesheet-->
  <link rel="stylesheet" href="../CSS/style.css">
  <!--GG Font-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
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
                    <a href="lienhe.php" class="nav-link">Contact</a>
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
   
    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?>
            <div class="alert alert-danger">
                <strong>Please fix the following errors!</strong>
                <ul>
                    <?php
                    foreach ($errors as $key => $value){
                        if (!empty($value)){
                            echo '<li>', $value, '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" class="alert alert-danger" >
            <h3 style="color:#fff">CREATE NEW USER</h3>
            <div class="form-group">
                <label class="col-sm-2 control-label">User Name : </label>
                <div class="col-sm-3">
                    <input class="form-control" id="Name" type="text" name="Name" value="<?php echo isFormValidated()? '': $_POST['Name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Full Name : </label>
                <div class="col-sm-3">
                    <input class="form-control" id="Name" type="text" name="fullname" value="<?php echo isFormValidated()? '': $_POST['fullname'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" id="Password" name="Password"
                           value="<?php echo isFormValidated()? '': $_POST['Password'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" id="Email" name="Email"
                           value="<?php echo isFormValidated()? '': $_POST['Email'] ?>">
                </div>
            </div>
            <div class="container">
                &nbsp;&nbsp;&nbsp;<button style="margin-left: -15px" type="submit" class="btn btn-success">Registration</button> &nbsp; &nbsp; &nbsp; &nbsp;
                <button type="reset" class="btn btn-info">Retype</button>
                <div style="margin-top: 10px"><a href="login_user.php">Login</a></div>
            </div>

        </form>
    </div>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?>
        <?php
        $user = [];
        $user['User_name'] = $_POST['Name'];
        $user['Password'] = $_POST['Password'];
        $user['Email'] = $_POST['Email'];
        $user['fullname']=$_POST['fullname'];
        $result = insert_user($user);
        $newUser = mysqli_insert_id($db);
        ?>
        <div class="container">
            <div class="alert alert-success">
                <strong>Success!</strong>
                <h2>A new User (ID: <?php echo $newUser ?>) has been created:</h2>
                <ul>
                    <?php
                    foreach ($_POST as $key => $value) {
                        if ($key == 'submit') continue;
                        if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <br>
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
                            <a href="#!">ABOUT US</a>
                        </li>
                        <li>
                            <a href="#!">
                                Daily News</a>
                        </li>
                        <li>
                            <a href="#!">AWARDS</a>
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
            <a href="#">Auctio Online.com</a>
        </div>
        <!-- Copyright -->
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