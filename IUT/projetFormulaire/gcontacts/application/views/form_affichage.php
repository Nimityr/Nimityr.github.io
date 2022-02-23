<div class='container'>

<?php 
$titre_form = $titre->titre;
$desc = $titre->description;
?>

<div class='titre_formulaire'><h1><?php echo $titre_form; ?></h1></div>
<div class='desc_formulaire'><h5><?php echo $desc; ?></h5></div>

<!-- <form method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>index.php/Affichage/reponses_send"> -->
<?php
echo form_open('Affichage/reponses_send');

foreach($question as $yolo){
        if($yolo !== array()){
            echo "<div class='question'><p class='titre_question' name='rep[".$yolo['question']['id']."][".$yolo['question']['titre']."'>".$yolo['question']['titre']."</p><p class='aide'>".$yolo['question']['help']."</p>";
            if($yolo['question']['type'] == "Cases à cocher"){
                $type = "checkbox";
                for($i = 0 ; $i < count($yolo['reponse']); $i++){
                    echo "<input type='checkbox' id='rep[".$yolo['question']['id']."][".$yolo['reponse'][$i]."]' name='rep[".$yolo['question']['id']."][".$yolo['reponse'][$i]."]' value='".$yolo['reponse'][$i]."'>";
                    $rep = $yolo['reponse'][$i];
                    echo "<label for=''>$rep</label><br>";
                }
            }else if($yolo['question']['type'] == "Champ de texte"){
                $type = "text";
                echo "<div><input required type='text' id='".$yolo['question']['id']."' name='rep[".$yolo['question']['id']."]' value='".$yolo['reponse'][$i]."'></div>";
            }else if($yolo['question']['type'] == "Zone de texte"){
                $type = "textarea";
                echo "<textarea id='".$yolo['question']['id']."' name='rep[".$yolo['question']['id']."]' value='".$yolo['reponse'][$i]."'></textarea>";
            }else if($yolo['question']['type'] == "Choix multiples"){
                $type = "radio";
                $num_rep = 0;
                $tab = $yolo['reponse'];
                for($i = 0 ; $i < count($yolo['reponse']); $i++){
                    echo "<input type='radio' id='".$yolo['question']['id']."' name='rep[".$yolo['question']['id']."' value='".$yolo['reponse'][$i]."'>";
                    $rep = $tab[$i];
                    echo "<label for=''>$rep</label><br>";
                }
            }else if($yolo['question']['type'] == "Liste déroulante"){
                $type = "select";
                echo "<select id='reponse' name='rep[".$yolo['question']['id']."][".$yolo['reponse'][0]."]'>";
                for($i = 0 ; $i < count($yolo['reponse']); $i++){
                    echo "<option name='rep[".$yolo['question']['id']."][".$yolo['reponse'][0]."] value='".$yolo['reponse'][$i]."'>".$yolo['reponse'][$i]."</option>";
                }
                echo "</select>";
            }
        }
    }
echo "</div><br><br><hr>";

?>
<input type='submit' name='submit' value='Envoyer ces réponses'>

</form>
</div>
