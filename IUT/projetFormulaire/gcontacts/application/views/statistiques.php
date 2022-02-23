<?php 

echo "<br>";
$percent = ($reponse['nb_r']/$nb_rep)*100;
echo $percent."  %  pour la réponse : ";

foreach ( $reponse as $fatigue){
    foreach($fatigue as $viv_le_php){
        echo $viv_le_php->reponse;
    }
}
