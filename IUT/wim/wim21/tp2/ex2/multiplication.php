<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body container>

<?php
            if (isset($_GET['table']) ) {
                  extract($_GET);
                  $table=filter_var($table, FILTER_SANITIZE_NUMBER_INT);
                  echo "<h3> Table de " . $table . "</h3>";
                  foreach(range(1, 10) as $i) {
                      echo "<li>  $i x $table  = "  .($i * $table). "<li/>";
            }
        }
?>
		<form  method="GET">
			<input type=text name="table" placeholder="table">
			<button>ENVOYER</button>
		</form>
	</body>
</html>
