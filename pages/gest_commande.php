<head>
    <?php
    $title = "Mes commandes";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>


<!-- importer le fichier de style -->
<link rel="stylesheet" href="../style/gest_commande.css" media="screen" type="text/css" />
</head>

<body>

    <div id="body">
        <?php

        //MYSQL SELECT INFORMATION TABLE HISTORIQUE ONLY
        $user = $_SESSION['iduser'];

        $requete_info = "SELECT * FROM historique WHERE Acheteur = $user ORDER BY Date_commande";
        $info = mysqli_query($db, $requete_info);
        $array_order = mysqli_fetch_all($info, MYSQLI_ASSOC);

        if (isset($_SESSION['iduser']) == false) { // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE

            header("Location: ../pages/login.php");
            die();
        } // IF ALREADY LOGGED IN, DISPLAY ORDERS
        else {
            if (!empty($array_order)) { ?>
                <table class="list_orders">
                    <tr>
                        <th>N° DE COMMANDE</th>
                        <th>DATE COMMANDE</th>
                        <th>MONTANT</th>
                        <th>FACTURE</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($array_order as $order) {
                    ?>

                        <tr>
                            <form action="../composants/pdf_facture.php?id=<?=$user?>" method="POST">
                                <td><input name="nb_order" id="input" class="id_input" readonly value="<?= $order["Numero_commande"] ?>"></td>
                                <td><input name="date_order" id="input" type="text" readonly value="<?= $order["Date_commande"]; ?>"></td>
                                <td><input name="cost_order" id="input" type="text" readonly value="<?= $order["Montant"] . ' €'; ?>"></td>
                                <td><span class="download_pdf"><button type="submit" class="download_btn">Télécharger en format PDF</button></span></td>
                            </form>
                        </tr>
                    <?php } ?>
                </table>
            <?php
            } else { ?>
                <h2 id="msg_no_order">Aucune commande</h2>;
        <?php
            }
        } ?>
    </div>

    <?php
    include "../composants/footer.php"
    ?>