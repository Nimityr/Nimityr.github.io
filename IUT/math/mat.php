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
    <!-- Script -->
    <script src="https://www.iut-fbleau.fr/projet/maths/?f=votes.js"></script>
    <script src="https://www.iut-fbleau.fr/projet/maths/?f=logins.js"></script>
    <!-- CSS -->
    <style type="text/css">

        table
        {
            border: 3px solid black;
            border-collapse: collapse;
        }
        td, th
        {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>CLASSIFICATEUR</h2>
        <p class="lead"><b>Classement pour la (les) matière(s) choisie(s) et classement final total avec la prise en compte du nombre de votes totaux et
                du poids de chaque étudiant.</b></p>
    </div>
</div>
<div style="width:96%; margin: 0 auto; overflow-X:hidden">
    <hr class="mb-4">
    <table class="text-center selection" style="width:100%;" data-tri="1" data-type="num">
        <caption class="text-center" style="caption-side: top; font-weight: bold; color: black;" >Classement calculé à partir de la matrice stabilisée des votes selon la méthode vue en cours :</caption>
        <thead id="thead1">
        </thead>
        <tbody id="tbdy1">
        </tbody>
    </table>
    <br/>
</div>
</body>
<script>
    var nomsLogins = Object.keys(logins); // nomsLogins : Array(111) ["alais", "bargoni", "caba", ..]
    var nombreLogins = nomsLogins.length; // 111

    var votants = Object.keys(votes); // votants : Array(201) ["abreudia", "aigueper", "anthoine", ..]    var m = <?php echo json_encode($_POST); ?>; // m : Object { acda: "acda", ?: "?", .. }

    var m = <?php echo json_encode($_POST); ?>; // m : Object { acda: "acda", ?: "?", .. }
    var tab_in = Object.values(m); // tab_in :  Array [ "acda", "?", .. ]
    var nombreMatieres = tab_in.length; // 1 (pour une matière par exemple)

    // CRÉATION D'UNE MATRICE EN TROIS DIMENSIONS (votant, voté, matière[1,2..])

    var matrices = new Array(nombreLogins);

    for(var i = 0; i < nombreLogins; i++)
    {
        matrices[i] = new Array(nombreLogins);

        for(var j = 0; j < nombreLogins; j++)
        {
            matrices[i][j] = new Array(nombreMatieres);

            for(var k = 0; k < nombreMatieres; k++)
            {
                // initialisation d'une matrice à trois dimensions de 'nombreLogins' par 'nombreLogins' et le selon le nombre de matière
                matrices[i][j][k] = 1/nombreLogins; // pour le moment, nous ne considérons aucuns votes .. et donc ne pas voter signifie "avoir voté pour tout le monde"
                // la valeur du poids est donc égale à un 1 vote divisé par le nombre d'étudiants pouvant être voté
            }
        }
    }

    // MISE À JOUR DE LA MATRICE

    var elus; // elus : Array pour stocker les étudiants votés par le votant

    for(var i = 0; i < nombreMatieres; i++)
    {
        var ligneVotant = 0; // lignesVotant :

        for(var login in logins) // pour un login dans logins (et tant que..)
        {
            if(votants.includes(login)) // si 'login' actuel à voté pour quelqu'un ...
            {
                var votesTotaux = votes[login]; // ... alors on récupère les votes du votant pour toutes les matières
                elus = Object.values(votesTotaux[tab_in[i].toUpperCase()]); // et pour chaque la matière actuelle, on stock tous les etudiant(s) voté par le votant dans elus

                // vérification si l'élu est correct .. (en partant de la fin pour ne pas être embêté avec les index supérieurs..)
                for(var j = elus.length - 1; j >= 0; j--)
                {
                    if(!nomsLogins.includes(elus[j])) // si le login de l'élu n'est pas inscrit dans les logins, ... (il ne faut donc pas le prendre en compte !)
                    {
                        elus.splice(j, 1); // ... alors on l'enlève du tableau
                    }
                }
                // puis pour chaque étudiant voté par le votant ...
                if(elus.length > 0)
                {
                    for(var j = 0; j < nombreLogins; j++) // si cet étudiant à été voté par le votant ..
                    {
                        if(elus.includes(nomsLogins[j]))
                        {
                            matrices[ligneVotant][j][i] = 1/elus.length; // .. son poids est de 1 divisé par le nombre total de voté
                        }
                        else // sinon ..
                        {
                            matrices[ligneVotant][j][i] = 0; // .. son poids vaut 0 et on passe au suivant !
                        }
                    }
                }
            }
            // ici, pas besoin de else car notre(nos) matrice(s) est(sont) initialisée(s) à 1/nomsLogins dès la création de cette (ces)dernière(s)
            ligneVotant++; // étudiant votant suivant
        }
    }

    // CRÉATION D'UNE MATRICE B

    var alpha = 0.1; // coefficient alpha = 0.1

    var matriceB = new Array(nombreLogins);

    for(var i = 0; i < nombreLogins; i++)
    {
        matriceB[i] = new Array(nombreLogins);

        for(var j = 0; j < nombreLogins; j++)
        {
            matriceB[i][j] = new Array(nombreMatieres);

            for(var k = 0; k < nombreMatieres; k++)
            {
                // initialisation d'une matrice à trois dimensions de 'nombreLogins' par 'nombreLogins' et le selon le nombre de matière.
                matriceB[i][j][k] = alpha / nombreLogins; // pour le moment, nous ne considérons aucuns votes .. et donc ne pas voter signifie "avoir voté pour tout le monde".
                // la valeur du poids est donc égale à un 1 vote divisé par le nombre d'étudiants pouvant être voté.
            }
        }
    }

    // DILUTION DE LA MATRICE

    for(var i = 0; i < nombreLogins; i++)
    {
        for(var j = 0; j < nombreLogins; j++)
        {
            for(var k = 0; k < nombreMatieres; k++)
            {
                matrices[i][j][k] = (matrices[i][j][k] * (1 - alpha)) + (matriceB[i][j][k]); // formule (0,9*A+B) où B = matrice ..
            }
        }
    }

    // OBTENTION DE L'ETAT STABLE EN MULTIPLIANT LA MATRICE (diluée) PAR ELLE MÊME (plus le nombre de fois multiplié est grand et plus les valeurs seront réelle..)

    for(var i = 0; i < 14; i++)
    {
        matrices = multiplierMatrices(matrices, nombreMatieres, nombreLogins);

        // TEST D'ERREURS
        /*
        for(var j = 0; j < nombreLogins; j++)
        {
            var sum = 0;
            for(var k = 0; k < nombreLogins; k++)
            {
                sum += matrices[j][k][0];
            }
            if(Math.abs(1 - sum) > 0.0001)
            {
                alert(sum);
            }
        }
        */
    }

    var thead1 = document.getElementById("thead1"); // thead1 se rapporte à l'id 'thead1' de notre code HTML
    var tbdy1 = document.getElementById("tbdy1"); // tbdy1 se rapporte à l'id 'tbdy1' de notre code HTML

    var tr = document.createElement("tr"); // tr = création d'une balise <tr>
    var thnom = document.createElement("th"); // thnom = création d'une balise <th>
    var thnbrvote = document.createElement("th"); // thnbrvote = création d'une balise <th>

    thnom.innerHTML = "ÉTUDIANT"; // ajout de texte dans notre élément thnom
    tr.appendChild(thnom); // ajout de cet élément à notre balise <tr>

    for (var i = 0; i < nombreMatieres; i++) // pour le nombre de matières choisies ....
    {
        var thmatiere = document.createElement("th"); // .. création d'une colonne pour la matière actuelle
        thmatiere.innerHTML = tab_in[i].toUpperCase(); // titre en majuscule
        tr.appendChild(thmatiere); // ajoabreudiaut
    }

    var thtotal = document.createElement("th");
    thtotal.innerHTML = "Total"; // titre en majuscule
    tr.appendChild(thtotal); // ajoabreudiaut


    thead1.appendChild(tr); // on ajoute tout le contenu de notre balise <tr>, à notre balise <thead1> lié à notre code HTML

    /*
        L'instruction for...in permet d'itérer sur les propriétés énumérables d'un objet qui ne sont pas des symboles.
        Pour chaque propriété obtenue, on exécute une instruction (ou plusieurs grâce à un bloc d'instructions).
    */

    /* Tableau vide destiné à recevoir des objets contenant les propriétés (ligne, total) */
    var classement_desordonne = [];

    for(var i = 0; i < nombreLogins; i++) // pour UN nom dans votes, et tant que ....
    {
        var ligne = document.createElement("tr"); // tr = réinitialisation de notre balise <tr>
        var case_nom = document.createElement("td"); // tdnom = création d'une balise <td>
        case_nom.innerHTML = nomsLogins[i]; // ajout du nom de l'étudiant actuel
        ligne.appendChild(case_nom); // ajout de cet élément à notre balise <tr>

        var total = 0;
        for(var j = 0; j < tab_in.length; j++)
        {
            var case_poids = document.createElement("td");
            var poids_arrondi = Math.floor(matrices[0][i][j] * 10000) / 100;
            case_poids.innerHTML = poids_arrondi;
            total += matrices[0][i][j];
            ligne.appendChild(case_poids);
        }

        total = Math.floor(total * 10000) / 100;
        var case_total = document.createElement("td");
        case_total.innerHTML = total;
        ligne.appendChild(case_total);

        /* On ajoute l'objet contenant les propriétés ligne et total dans le tableau */
        classement_desordonne.push({l:ligne, t:total});
    }

    /* On trie les objets du tableau selon la valeur du total dans l'ordre décroissant */
    var classement_ordonne = classement_desordonne.sort(compare);
    for(var cle in classement_ordonne)
    {
        /* On ajoute la ligne html au corps du tableau */
        tbdy1.appendChild(classement_ordonne[cle].l);
    }

    function compare(a, b)
    {
        if(a.t < b.t)
        {
            return 1;
        }
        if(a.t > b.t)
        {
            return -1;
        }
        return 0;
    }


    function multiplierMatrices(matrice, nbre_matrices, taille_matrice)
    {
        /* Création des matrices de résultat */
        var result = new Array(taille_matrice);

        for(var i = 0; i < taille_matrice; i++)
        {
            result[i] = new Array(taille_matrice);

            for(var j = 0; j < taille_matrice; j++)
            {
                result[i][j] = new Array(nbre_matrices);
            }
        }

        for(var l = 0; l < nbre_matrices; l++)
        {
            for (var i = 0; i < taille_matrice; i++)
            {
                for (var j = 0; j < taille_matrice; j++)
                {
                    var sum = 0;
                    for (var k = 0; k < taille_matrice; k++)
                    {
                        sum += (matrice[i][k][l] * matrice[k][j][l]);
                    }

                    result[i][j][l] = sum;
                }
            }
        }
        return result;
    }
</script>
</html>