<?php
$title = "header";
include "../composants/main.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<div class="super_container">
    <!-- Header -->
    <header class="header" style="position:fixed; background-color:white;">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg"></div>
                                <div><a href="../pages/newuser.php">Créer un compte</a></div>
                                <div><a href="../pages/login.php">Connexion</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Header Main -->
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="../pages/home.php" style="color:black">FoneMarket</a></div>
                        </div>
                    </div> <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix"> <input style="width:100%" required="required" class="header_search_input" placeholder="Rechercher des produits...">
                                      <button type="submit" class="header_search_button trans_300" value="Submit" style="background-color:black;"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png"></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="../pages/favoris.php">Favoris</a></div>
                                </div>
                            </div> <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"><a href="../pages/panier.php"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png"></a>
                                        <div class="cart_count"><span>0</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="../pages/panier.php"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Main Navigation -->
        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="main_nav_content d-flex flex-row">
                            <!-- Main Nav Menu -->
                            <div class="main_nav_menu">
                                <ul class="standard_dropdown main_nav_dropdown"> 
                                    <li class="hassubs"> <a href="../pages/produit.php">Produits<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li> <a href="#">Apple<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">iPhone 13 Pro<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">iPhone 13<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">iPhone 12<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">iPhone 11<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">iPhone SE<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Samsung<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                    <li><a href="#">S22<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">S22+<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">S22 Ultra 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">S21 FE 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Galaxy Z series<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Galaxy A53 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Galaxy S20FE<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Galaxy A52s 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Galaxy A22 5G<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                          </li>
                                            <li><a href="#">Xiaomi<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                    <li><a href="#">Xiaomi 12 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Xiaomi 12 Pro 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Xiaomi 11T Pro<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi Note 11<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi Note 11S<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi Note 11 Pro<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi 10<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi 9A<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi 9C NFC<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                                </li>       
                                            <li><a href="#">Huawei<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Google<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">OnePlus<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Oppo<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="../pages/marketplace.php">Marketplace</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav> 
    </header>
</div>