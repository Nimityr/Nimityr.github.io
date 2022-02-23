
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Films</title>
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body container>
		<h2 class="_bb1 _mts">Films</h2>
<?php
/* 2 variables
 * mes => filtre le metteur en scène
 * page => filtre la page du tableau
 * */
$filtreMes = filter_input(INPUT_GET, 'mes', FILTER_VALIDATE_INT, array('min-range'=>0));
if ($filtreMes === FALSE || $filtreMes === NULL) $filtreMes =-1;
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('min-range'=>1));
if ($page === FALSE || $page === NULL )
	$page = 1;

$page = filter_input(INPUT_GET,"page",FILTER_VALIDATE_INT,array('min_range'=>0));
if ($page === FALSE || $page === NULL )
	$page = 1;
	$nbitem = 10;

$mes_filtre = filter_input(INPUT_GET,"mes",FILTER_VALIDATE_INT,array('min_range'=>0));
if ($mes_filtre === FALSE || $mes_filtre === NULL)
	$mes_filtre = -1;

include './include/connexion.php';
$req = "SELECT nom,prenom,idArtiste FROM Artiste
WHERE Artiste.idArtiste IN (SELECT idMes FROM Film)
ORDER BY Artiste.nom;";

$resMes = mysqli_query ($conn, $req);
if ($filtreMes !=-1) $filtre="WHERE Film.idMes='$filtreMes'";
else
	$filtre="";
$limit = "LIMIT ".(($page-1)*$nbitem.",".$nbitem);

$req= "SELECT SQL_CALC_FOUND_ROWS titre, annee,genre,nom,prenom,idFilm
FROM Film join Artiste on Film.idMes = Artiste.idArtiste $limit";

$res = mysqli_query ($conn, $req);
$res1 = mysqli_query($conn,"SELECT FOUND_ROWS();");
$res2 = mysqli_fetch_row($res1);
$total = $res2[0];

$nbpages = ceil ($total/$nbitem);
?>

		<!-- formulaire pour filtrer l'affichage suivant un réalisateur -->

		<form  method="GET" action="?page=1">
			Réalisateur : <select name="mes">
				<option value="-1">Tous</option>
				<?php foreach($resMes as $mes) {
					if ($filtreMes == $mes ['idArtiste']) $selected = "selected";
					else
						$selected ="";
					echo "<option value='".$mes['idArtiste']."'>".$mes['prenom']." ".$mes['nom']."</option>";
				} ?>
			</select>
			<button  class="btn">Chercher</button>
		</form>

		<!-- Table des films -->

		<table>
			<thead>
				<tr>
					<th>Titre</th>
					<th>Année</th>
					<th>Genre</th>
					<th>Réalisateur</th>
				</tr>
			</thead>
			<tbody>
<?php
if ($res)
{
	foreach($res as $film)
	{
		echo "<tr>";
		echo "<td><a href='fiche.php?film=".$film['idFilm']."'>"
			.$film['titre']
			."</a></td><td>"
			.$film['annee']
			."</td><td>"
			.$film['genre']
			."</td><td>".$film['prenom']." ".$film['nom']
			."</td>";
		echo "</tr>";
	}
}
?>
			</tbody>
		</table>

		<!-- Barre de pagination -->
<?php

$prev=$page-1;
$next=$page+1;
if ($prev<1) $prev=1;
if ($next>$nbpages) $next=$nbpages;
?>
		<ul class="_mts button-group">
			<li>
				<a class="item" href="?<?php echo $filtreMes;?>&page=<?php echo $prev;?>">
					«
				</a>
			</li>

<?php
for($i=1;$i<=$nbpages;$i++){
	$class="";
	if ($i==$page) $class="-active";
	echo "<li class='item $class'><a href='?mes=$filtreMes&page=$i'>$i</a></li>";
}
?>

			<li>
				<a class="item" href="?mes=<?php echo $filtreMes;?>&page=<?php echo $next;?>">
					»
				</a>
			</li>
		</ul>
	</body>
</html>