<?php
include("config/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/main_style.css">
    <title>Home</title>
</head>
<body>
    <header>
        <!-- Main Navigation -->

        <div class="main_nav_container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <div class="logo_container">
                                    <a href="#">Scammable</a>
                                </div>
                                <nav class="navbar">
                                    <ul class="navbar_menu">
                                        <li><a href="index.php">home</a></li>
                                        <li><a href="categories.php">shop</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                    </ul>
                                    <li class="account">
                                        <a href="#">
                                            MY ACCOUNT
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                            <li><a href="login.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                        </ul>
                                    </li>
                                    <ul class="navbar_user">
                                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                        <li class="checkout">
                                            <a href="#">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="hamburger_container">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
    </header>
</body>
</html>