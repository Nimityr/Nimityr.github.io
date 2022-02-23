<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">

		<title></title>
	</head>
	<body container>
		<h4 class="_bb1 _ms">Pierre, Feuille, Ciseaux</h4>
		<div class="_text-center">
			<p class="_c-base-primary">Choississez votre coup </p>
			<a href="?coup=0"><img width="50px" src="./images/pierre.png"></a>
			<a href="?coup=1"><img width="50px" src="./images/feuille.png"></a>
			<a href="?coup=2"><img width="50px" src="./images/ciseaux.png"></a>
		</div>
		<?php
			if (isset($_GET['coup'])):
				$coup_joueur = $_GET['coup'];

				if($coup_joueur == 0){

					$resultat = "pierre.png";
				}
				else if($coup_joueur == 1){

					$resultat = "feuille.png";
				}

				else if($coup_joueur == 2){

					$resultat = "ciseaux.png";
				}



		?>
				<div grid>
					<div column>
						<h5 class="_bb1 _ms">Votre Coup</h5>
						<div class="_text-center">
							<img src="./images/<?php echo($resultat) ?>">
						</div>
					</div>

				<?php

				$coup_ordi = rand(0,2);

				if($coup_ordi == 0){

					$resultat = "pierre.png";
				}
				else if($coup_ordi == 1){

					$resultat = "feuille.png";
				}

				else if($coup_ordi == 2){

					$resultat = "ciseaux.png";
				}



		?>
					<div column>
						<h5 class="_bb1 _ms">Celui de l'ordinateur</h5>
						<div class="_text-center">
							<img src="./images/<?php echo($resultat) ?>">
						</div>
					</div>
				</div>
		<?php

		if($coup_joueur == $coup_ordi){
			$victoire = "Try again";
		}
		else if($coup_joueur == 0 && $coup_ordi == 1){
			$victoire = "You lose";
		}
		else if($coup_joueur == 0 && $coup_ordi == 2){
			$victoire = "You win";
		}
		else if($coup_joueur == 1 && $coup_ordi == 0){
			$victoire = "You win";
		}
		else if($coup_joueur == 1 && $coup_ordi == 2){
			$victoire = "You lose";
		}
		else if($coup_joueur == 2 && $coup_ordi == 0){
			$victoire = "You lose";
		}
		else if($coup_joueur == 2 && $coup_ordi == 1){
			$victoire = "You win";
		}
		endif;
		?>
				<h2 class="_mts _text-center"><span class=""><?php echo($victoire) ?></span></h2>
			</div>	
		</body>
	</html>
