<?php
    $num = $_GET["nb"];
    $num = (str)$num;

    //longueur de la chaine $num
    $length = strlen($num);
     
    //resultat de l'addition de tous les chiffres
    $tot = 0;
    for($i=$length-1;$i>=0;$i--)
    {
        $digit = substr($num, $i, 1);
         
        if ((($length - $i) % 2) == 0)
        {
            $digit = $digit*2;
            if ($digit>9)
            {
                $digit = $digit-9;
            }
        }
        $tot += $digit;
    }
     
    if (($tot % 10) != 0){
        echo ("Numéro de carte invalide !");
    }

?>