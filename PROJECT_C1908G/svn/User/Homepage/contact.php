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
            .container.menubg {
                margin-right: 100px;
            }
            .social-button{
                display: inline-grid;
                position: fixed;
                bottom: 15px;
                left: 45px;
                min-width: 45px;
                text-align: center;
                z-index: 99999;
            }
            .social-button-content{
                display: inline-grid;
            }
            .social-button a {padding:8px 0;cursor: pointer;position: relative;}
            .social-button i{
                width: 40px;
                height: 40px;
                background: #FFF!important;
                color: red!important;
                border-radius: 100%;
                font-size: 20px;
                text-align: center;
                line-height: 1.9;
                position: relative;
                z-index: 999;
            }
            .social-button span{
                display: none;
            }
            .alo-circle {
                animation-iteration-count: infinite;
                animation-duration: 1s;
                animation-fill-mode: both;
                animation-name: zoomIn;
                width: 50px;
                height: 50px;
                top: 3px;
                right: -3px;
                position: absolute;
                background-color: #000!important;
                -webkit-border-radius: 100%;
                -moz-border-radius: 100%;
                border-radius: 100%;
                border: 2px solid rgba(30, 30, 30, 0.4);
                opacity: .1;
                border-color: #0089B9;
                opacity: .5;
            }
            .alo-circle-fill {
                animation-iteration-count: infinite;
                animation-duration: 1s;
                animation-fill-mode: both;
                animation-name: pulse;
                width: 60px;
                height: 60px;
                top: -2px;
                right: -8px;
                position: absolute;
                -webkit-transition: all 0.2s ease-in-out;
                -moz-transition: all 0.2s ease-in-out;
                -ms-transition: all 0.2s ease-in-out;
                -o-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
                -webkit-border-radius: 100%;
                -moz-border-radius: 100%;
                border-radius: 100%;
                border: 2px solid transparent;
                background-color: rgba(0, 175, 242, 0.5);
                opacity: .75;
            }
            .call-icon:hover > span, .mes:hover > span, .sms:hover > span, .zalo:hover > span{display: block}
            .social-button a span {
                background:#000;
                border-radius: 3px;
                text-align: center;
                padding: 9px;
                display: none;
                width: 180px;
                margin-left: 10px;
                position: absolute;
                color: #fff;
                z-index: 999;
                top: 9px;
                left: 40px;
                transition: all 0.2s ease-in-out 0s;
                -moz-animation: headerAnimation 0.7s 1;
                -webkit-animation: headerAnimation 0.7s 1;
                -o-animation: headerAnimation 0.7s 1;
                animation: headerAnimation 0.7s 1;
            }
            @-webkit-keyframes "headerAnimation" {
                0% { margin-top: -70px; }
                100% { margin-top: 0; }
            }
            @keyframes "headerAnimation" {
                0% { margin-top: -70px; }
                100% { margin-top: 0; }
            }
            .social-button a span:before {
                content: "";
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 10px 10px 10px 0;
                border-color: transparent #000 transparent transparent;
                position: absolute;
                left: -10px;
                top: 10px;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('.user-support').click(function(event) {
                    $('.social-button-content').slideToggle();
                });
            });
        </script>
    </head>

    <body>
    <?php
    $link_img = "picture/";
    ?>
    <?php
    $sql = "SELECT *FROM category";
    $result = mysqli_query($db, $sql);
    $_product = mysqli_fetch_assoc($result);

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
        <div id="Carousel" class="carousel carousel-fade slide border" data-ride="carousel">
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

    <div class="container" style=" text-align: center;font-size:20px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
        <p>Auctions Table</p>
        <p><i class="fas fa-home mr-3"></i>Address : 54 - Le Thanh Nhi - Quan Hai Ba Trung - Ha Noi</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7702977853337!2d105.83965251486124!3d21.001842886012945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac70b0b17efb%3A0xcb19bbdc5e05ca84!2zNTQgTMOqIFRoYW5oIE5naOG7iywgxJDhu5NuZyBUw6JtLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1596019203754!5m2!1sen!2s" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <br>
        <i class="fas fa-phone mr-3"></i><a href="#">Hotline : 0998989999 </a>
        <br>
        <i class="fas fa-envelope mr-3"></i></i><a href="#">Email : Abc@gmail.com </a>
        <br>
        <i class="fab fa-facebook-f mr-2"></i><a href="#">Facebook : Auctions Shop</a>

        <div class="social-button">
            <div class="social-button-content">
                <a href="#" class="call-icon" rel="nofollow"  class="Hot">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    <div class="animated alo-circle"></div>
                    <div class="animated alo-circle-fill  "></div>
                    <span>Hotline</span>
                </a>
                <a href="#" class="sms">
                    <i class="fa fa-weixin" aria-hidden="true"></i>
                    <span>SMS</span>
                </a>
                <a href="#" class="mes">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    <span> Facebook</span>
                </a>
                <a href="#" class="zalo">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    <span>Zalo</span>
                </a>
            </div>

            <a class="user-support">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <div class="animated alo-circle"></div>
                <div class="animated alo-circle-fill"></div>
            </a>
        </div>
        <!-- Load Facebook SDK for JavaScript -->
    </div>
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
                            <a href="Home.php">PROJECTS</a>
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
            <a href="#">AuctionsTable.com</a>
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