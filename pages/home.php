<header>
<?php
    include "../composants/header.php";
    include "../composants/db.php"; 
?>
</header>

<body>

<div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel" style="margin-top:200px">
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselExampleIndicators"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleIndicators"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleIndicators"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../media/banniere.jpg" class="d-block w-100" alt="Wild Landscape"/>
    </div>
    <div class="carousel-item">
      <img src="../media/banniere.jpg" class="d-block w-100" alt="Camera"/>
    </div>
    <div class="carousel-item">
      <img src="../media/banniere.jpg" class="d-block w-100" alt="Exotic Fruits"/>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h2 style="margin-top:40px">Peut-être votre prochain smartphone...</h2>

<div class="grid">

  <div class="item">
    $img = mysqli_query()
  </div>

  <div class="item">
    Product 2
  </div>

  <div class="item">
    Product 3
  </div>

</div>    

</body>

<?php
    include "../composants/footer.php";
    ?>  