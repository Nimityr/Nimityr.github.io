<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Noah Lacaste">
        <title>Classificateur</title>

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- CSS -->
        <style type="text/css">
            .btn:hover
            {
                background-color: #9cc1aa !important;
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <h2 style="font-weight: bold;">CLASSIFICATEUR</h2>
                <br/>
                <p class="lead">
                	Ce projet consiste à créer un moteur de recherche des compétences dans votre promotion.
                </p>
            	<p class="lead">
            		L'utilisateur doit pouvoir choisir une ou plusieurs matières.
            		<br/>
            		Vous devez ensuite lui fournir un classement d'étudiants dans cette (ces) matière(s).
            	</p>
                <p class="lead">
                	Si vous êtes étudiant à l'IUT de Sénart-Fontainebleau, vous pouvez vous rendre <a href="http://www.iut-fbleau.fr/projet/maths/projets/classificateur" target="_blank" style="font-weight:bold;color:#262626;">ici</a> afin de voter pour les étudiants qui vous semblent compétent dans un domaine. Les votes en cours sont consultables <a href="http://www.iut-fbleau.fr/projet/maths/?f=rankref" target="_blank" style="font-weight:bold;color:#262626;">ici</a>.
                </p>
            </div>
            <hr class="mb-4">
            <h4 class="mb-3">Choix :</h4>
            <form action="mat.php" method="POST" enctype="multipart/form-data">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id1" name="acda" value="acda">
                    <label class="custom-control-label" for="id1">ACDA</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id2" name="ang" value="ang">
                    <label class="custom-control-label" for="id2">ANGLAIS</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id3" name="apl" value="apl">
                    <label class="custom-control-label" for="id3">APL</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id4" name="art" value="art">
                    <label class="custom-control-label" for="id4">ART</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id5" name="asr" value="asr">
                    <label class="custom-control-label" for="id5">ASR</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id6" name="ec" value="ec">
                    <label class="custom-control-label" for="id6">EC</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id7" name="egod" value="egod">
                    <label class="custom-control-label" for="id7">EGOD</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id8" name="mat" value="mat">
                    <label class="custom-control-label" for="id8">MATHS</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id9" name="sgbd" value="sgbd">
                    <label class="custom-control-label" for="id9">SGBD</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="id10" name="sport" value="sport">
                    <label class="custom-control-label" for="id10">SPORT</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-lg btn-block bhover" style="background-color: #b2dcc2; font-weight: bold;" type="submit">ACCÉDER AU CLASSEMENT DE CETTE (CES) MATIÈRE(S).</button>
            </form>
            <p class="mt-5 mb-3 text-center text-muted">Projet réalisé par <b>Noah Lacaste</b>
        </div>
    </body>
</html>