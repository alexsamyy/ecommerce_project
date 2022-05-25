<head>
    <?php
    include "../composants/main.php";
    require_once "../composants/db.php";
    ?>
    <link rel="stylesheet" href="../style/header.css" media="screen" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script>
        function search() {
            var mot = document.getElementsByName('Rechercher')[0].value;
            if ((mot.length < 1)) {
                document.getElementById("search_prod").style.display = "none";
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("search_prod").style.backgroundColor = "white";
                    document.getElementById("search_prod").style.display = "block";
                    document.getElementById("search_prod").innerHTML = this.responseText;
                }
            }
            var req = "../fonctions/search.php?Rechercher=" + mot;
            xmlhttp.open("GET", req, true);
            xmlhttp.send();
        }

        function remove(){
            var mot = document.getElementsByName('Rechercher')[0].value;
            if ((mot.length == 0)) {
                document.getElementById("search_prod").style.display = "none";
            }
        }
    </script>
</head>

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
                                <div class="user_icon hassubs">

                                    <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg">
                                </div>

                                <a href="../pages/user.php">
                                    <?php
                                    $message = "Hello ";
                                    if (isset($_SESSION['iduser']) == true) {
                                        $user = $_SESSION['iduser'];

                                        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
                                        $result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_array($result);

                                        $row = $row['PRENOM'];

                                        // afficher un message
                                        echo ($message . "" . $row . " !");
                                    } else { ?>
                                        <div><a href="../pages/newuser.php">Créer un compte</a></div>
                                        <span>|</span>
                                        <div><a href="../pages/login.php">Connexion</a></div>
                                    <?php
                                    }
                                    ?>
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
                                    <form action="../pages/recherche.php" class="header_search_form clearfix">

                                        <!-- INPUT BARRE DE RECHERCHE -->
                                        <input autocomplete="off" type="search" onkeyup="remove()" oninput="search()"
                                        style="width:100%;" required="required" class="header_search_input" name="Rechercher" placeholder="Rechercher des produits...">
                                        <!------------------------------>
                                        <span id="search_prod" class="search_prod"></span>

                                        <button type="submit" class="header_search_button trans_300" value="Submit" style="background-color:black;"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                            <!-- Cart -->

                            <!-- NOMBRE ARTICLE -->
                            <div class="nb_total_panier">

                                <?php

                                if (!isset($_SESSION['iduser'])) {
                                    $total_article = 0;
                                } else {
                                    $total = "SELECT SUM(QUANTITE) AS total_article FROM panier WHERE ID_UTILISATEUR = $user";
                                    $res = mysqli_query($db, $total);
                                    $data_row = mysqli_fetch_array($res);
                                    $total_article = $data_row['total_article'];
                                    if ($total_article == null) {
                                        $total_article = 0;
                                    }
                                }


                                ?>

                            </div>

                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"><a href="../pages/panier.php"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png"></a>
                                        <div class="cart_count"><span><?= $total_article ?></span></div>
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
                                            <li> <a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=Apple">Apple<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=iPhone 13 Pro">iPhone
                                                            13 Pro<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=iPhone 13">iPhone
                                                            13<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=iPhone 12">iPhone
                                                            12<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=iPhone 11">iPhone
                                                            11<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=iPhone SE">iPhone
                                                            SE<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=Samsung">Samsung<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=Galaxy S22">S22<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=Galaxy S22 Plus">S22+<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="http://localhost/FoneMarket/pages/produit_name.php?name=Galaxy S22 Ultra">S22
                                                            Ultra 5G<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="#">S21 FE 5G<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="#">Galaxy Z series<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=Xiaomi">Xiaomi<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">Xiaomi 12 5G<i class="fas fa-chevron-down"></i></a>
                                                    </li>
                                                    <li><a href="#">Xiaomi 12 Pro 5G<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Xiaomi 11T Pro<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Redmi Note 11<i class="fas fa-chevron-down"></i></a>
                                                </ul>
                                            </li>
                                            <li><a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=Huawei">Huawei<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=Google">Google<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=OnePlus">OnePlus<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="http://localhost/FoneMarket/pages/produit_marque.php?marque=Oppo">Oppo<i class="fas fa-chevron-down"></i></a></li>
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
</div>include "../composants/header.php";