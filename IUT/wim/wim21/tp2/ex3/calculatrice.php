<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title></title>
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body container>
		<h3 class="_bb1">Calculatrice</h3>
		<form  class="_text-center" method="POST">
			<input placeholder="un nombre" type="text" name="op1" />

			<!-- opération -->

			<select name="operation">
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="x">x</option>
				<option value="/">/</option>
			</select>

			<!-- opérande 2 -->

			<input placeholder="un nombre" type="text" name="op2" />

			<!-- bouton -->

			

			<button name="soumis"> Calculer</button>

		</form>
		
		<?php 

		$op1=$_POST['op1'];
		$op2=$_POST['op2'];
		$operation=$_POST['operation'];

		echo "$op1 $operation $op2";

		?>

		</div>
	</body>
</html>
