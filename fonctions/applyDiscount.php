<?php
session_start();
ob_start();
// connexion à la base de données
require_once "../composants/db.php";
include "../composants/main.php";
?>
<?php
if (isset($_GET['discount'])) {
    $promo = $_GET['discount'];
    $total_panier = $_GET['total'];

    $rq_check_promo = "SELECT * FROM promotion WHERE promotion = $promo";
    if ($result_promo = mysqli_query($db, $rq_check_promo)) {
        if ($row_check_promo = mysqli_fetch_array($result_promo)) {
            $discount_message = "Promotion appliquée " . $promo . " % !";
            $total_panier = $total_panier - (($total_panier / 100) * $promo);
            $msg_total_panier = $total_panier . ' €';

            $total_cost = $total_panier + 20;
            $total_cost_message = $total_cost . ' €';
        } else {
            $discount_message = "";
            $msg_total_panier = $total_panier . ' €';

            $total_cost = $total_panier + 20;
            $total_cost_message = $total_cost . ' €';
        }
        echo "$discount_message|$msg_total_panier|$total_cost_message";
    } else {
        $discount_message = "";
        $msg_total_panier = $total_panier . ' €';

        $total_cost = $total_panier + 20;
        $total_cost_message = $total_cost . ' €';

        echo "$discount_message|$msg_total_panier|$total_cost_message";
    }
}
