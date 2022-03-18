<?php
$title = "header";
include "main.php";
?>


<!-- Header -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Logo -->
      <a class="navbar-brand mt-2 mt-lg-0" href="home">
        <img
          src="media/logo.jpg"
          height="15"
          alt="Logo"
          loading="lazy"
          style="width:200px; height:100px"
        />
      </a>
      <!-- Logo -->

      <!-- Lien -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="produit.php" style="color:black">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="marketplace.php" style="color:black">Marketplace</a>
        </li>
      </ul>
      <!-- Lien -->

    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

    <!-- Barre de recherche -->
        


    <!-- Barre de recherche -->

    <!-- Icon -->
    <a class="text-reset me-3" href="login">
      <i class="fas fa-user-circle fa-3x"></i>
    </a>

    <!-- Notifications -->
    <div class="dropdown">
      <a
        class="text-reset me-3 dropdown-toggle hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"   
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
        <a href="panier" style="color : black"><i class="fas fa-shopping-basket fa-3x"></i></a>
        <span class="badge rounded-pill badge-notification bg-danger">1</span>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="#">Some news</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            class="fas fa-user-circle fa-lg"
            style="color:black"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="user">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
</div>
<!-- Header -->

