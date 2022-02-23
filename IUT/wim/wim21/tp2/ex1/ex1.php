<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">
		<meta charset="UTF-8" />
		<title></title>
	</head>
	<body container>
		<div grid>
			<div column="8 +2">
				<h3 class="_bb1 _ms _pbs">

					<?php

					echo "Bonjour ";
					
					$nom=$_POST['nom'];
					$nom=ucfirst(filter_var($nom, FILTER_SANITIZE_STRING));
					$prenom=$_POST['prenom'];
					$prenom=ucfirst(filter_var($prenom, FILTER_SANITIZE_STRING));
					$sexe=$_POST['sexe'];
					$sexe=ucfirst(filter_var($sexe, FILTER_SANITIZE_STRING));

					if ($sexe == 'Homme') {

						echo "Monsieur $nom $prenom";
					}

					else {

						echo "Madame $nom $prenom";
					}


					?>

				</h3>
			</div>
		</div>
	</body>
</html>
