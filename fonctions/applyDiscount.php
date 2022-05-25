<?php 
    if(isset($_GET['discount'])){
        $promo = $_GET['discount'];
        $total_panier = $_GET['total'];

        $discount_message = "Promotion appliquée -10% !";
    
        if ($promo == "WELCOME"){
            $total_panier = $total_panier - $total_panier / 100 * 10;
            $msg_total_panier = $total_panier . ' €';

            $total_cost = $total_panier + 20;
            $total_cost_message = $total_cost . ' €';
        }
        else{
            $discount_message = "";
            $msg_total_panier = $total_panier . ' €';

            $total_cost = $total_panier + 20;
            $total_cost_message = $total_cost . ' €';
        }
        echo "$discount_message|$msg_total_panier|$total_cost_message";
    }
?>