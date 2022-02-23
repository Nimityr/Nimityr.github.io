    <!DOCTYPE html>
    <html lang="en">
    	<head>
    		<meta charset="UTF-8" />
    		<title>Films</title>
    		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
    		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
    		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
    		<link rel="stylesheet" href="./css/style.css">
    	</head>
    	<body container>
    		<?php
    		if (isset($_GET['erreur'])) echo "<section class='alert-box -warning'>Erreur</section>"
    		?>
    		<form  method="POST" action="verification.php">
    			<label for="">Login<input name="login" type="text"></label>
    			<label for="">Password<input type="password" name="password"></label>
    			<button>Envoyer</button>
    		</form>
    	</body>
    </html>
