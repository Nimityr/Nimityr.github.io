<?php
include './include/data.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>tp1 - ex3</title>
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body container>
		<h2 class="_bb1 _mxs _c-base-primary">Exercice 3 : IMC </h2>
			<table>
				<thead> 
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Taille</th>
						<th>Poids</th>
						<th>IMC</th>
					</tr>
				</thead>
				<tbody>

					<!-- À compléter -->

					<?php

						foreach($data as $truc)
						{
							$IMC = round(10000 * $truc["Poids"]/($truc["Taille"]*$truc["Taille"]),2);

							if ($IMC > 25)
							{
								$couleur = 'background-color:pink';

							}elseif ($IMC < 20) {

								$couleur = 'background-color:coral';

							}else{

								$couleur = 'background-color:null';
							}

							echo "<tr style=$couleur>";

							foreach ($truc as $personne) 
							{
								echo "<td> $personne</td>";
							}

						echo "<td>" . round(10000 * $truc["Poids"]/($truc["Taille"]*$truc["Taille"]),2);
						echo "</tr>";	
						}
						
					?>

				</tbody>
			</table>
	</body>
</html>
