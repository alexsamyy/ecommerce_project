<head>
  <?php
  $title = "Produit";
  session_start();
  include "../composants/header.php";
  include "../composants/main.php";
  // connexion à la base de données
  require_once "../composants/db.php";
  ?>
  <link rel="stylesheet" href="../style/produit.css" media="screen" type="text/css" />

  <script>
    /*
    function filter_brand() {
      var marque = document.getElementById("marque-select").value;
      if (marque == null) {
        document.getElementById("demo").innerHTML = "";
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML = this.responseText;
        }
      }
      var req = "../fonctions/filter_brand.php?marque=" + marque;
      xmlhttp.open("GET", req, true);
      xmlhttp.send();
    }
    */
  </script>

</head>

<body>

  <div class="title_page">
    <h1 class="title_asked_page">Smartphones</h1>
  </div>

  <?php 
  /*
  </div>
  <div class="filtres">
    <form method="get">
      <fieldset>
        <span style="font-weight:bold">Filtres :</span>

        <!-- CHOIX DE LA MARQUE -->
        <select style="color:black" onchange="filter_brand()" name="marque" id="marque-select">
          <option value="null">Marque</option>
          <option value="'Apple'">Apple</option>
          <option value="'Samsung'">Samsung</option>
          <option value="'Xiaomi'">Xiaomi</option>
          <option value="'Huawei'">Huawei</option>
          <option value="'Google'">Google</option>
          <option value="'Oneplus'">OnePlus</option>
          <option value="'Oppo'">Oppo</option>
        </select>

        <!-- MINIMUM PRIX / MAXIMUM PRIX -->
        <input name="min_price" onkeyup="filter_price()" value="0" style="width:50px" type="number" placeholder="€ min">
        <input name="max_price" onkeyup="filter_price()" value="5000" style="width:50px" type="number" placeholder="€ max">

        <!-- CHOIX SYSTEME EXPLOITATION -->
        <select style="color:black" onchange="filter_syst()" name="syst" id="syst-select">
          <option value="null">Système d'exploitation</option>
          <option value="'iOS'">iOS</option>
          <option value="'Android'">Android</option>
        </select>

        <!-- CHOIX STOCKAGE -->
        <select style="color:black" onchange="filter_stockage()" name="stock" id="stock-select">
          <option value="null">Stockage</option>
          <option value="32">32 Go</option>
          <option value="64">64 Go</option>
          <option value="128">128 Go</option>
          <option value="256">256 Go</option>
          <option value="512">512 Go</option>
          <option value="1000">1 To</option>
        </select>

        <!-- CHOIX RESEAU -->
        <select style="color:black" onchange="filter_color()" name="res" id="res-select">
          <option value="null">Réseaux</option>
          <option value="'4G'">4G</option>
          <option value="'4G+'">4G+</option>
          <option value="'5G'">5G</option>
        </select>

        <!-- CHOIX DOUBLE SIM OU NON -->
        <select style="color:black" onchange="filter_sim()" name="slot_sim" id="sim-select">
          <option value="null">Dual sim</option>
          <option value="true">oui</option>
          <option value="false">non</option>
        </select>
      </fieldset>
    </form>
    */
    ?>
  <!-- Triage en fonction du prix -->
  </div>
  </form>

  <!-- FIN NAV BAR SIDE FILTERS -->


  <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
  <div class="grid" id="demo">
    <!-- GRID PARENT -->
    <?php
    $requete = "SELECT * FROM smartphone WHERE NEUF = true";
    $result = mysqli_query($db, $requete);
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <!-- GRID ENFANT -->
      <div class="grid_in">
        <br>
        <div>
          <!-- IMAGE -->
          <a href="/FoneMarket/pages/page_produit.php?id=<?= $row["ID"]; ?>">
            <div class="img_place">
              <img class="img" src="<?= $row["PHOTO"]; ?>">
            </div>
          </a>
          <br>
          <br>
          <!-- INFORMATION PRODUIT -->
          <div class="info_product">
            <h4 class="nom"><?= $row["NOM"]; ?></h4>
            <p class="description"><?= substr($row["DESCRIPTION"], 0, 110);
              if (strlen($row["DESCRIPTION"]) > 110) { ?>
                <span>...</span>
                <a class="see_more" href="/FoneMarket/pages/page_produit.php?id=<?= $row["ID"]; ?>">Voir
                  plus</a>
              <?php
              }
              ?>
            </p>

            <h6 class="prix"><?= $row["PRIX"]; ?> €</h6>
          </div>

        </div>
      </div>
    <?php
    }
    ?>
  </div>

  <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->

</body>

<footer>
  <?php
  include "../composants/footer.php";
  ?>
</footer>