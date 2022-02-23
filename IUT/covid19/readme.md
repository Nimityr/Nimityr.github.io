# Projet WIM4.1


## But

Écrire une application web en javascript qui permet de consulter
des données relatives à la pandémie du covid 19.


- La partie cliente devra être réaliser au moyen du framework [riotjs](https://riot.js.org/).
- Les données   seront  récupérées  au moyen de [l'api covid19api](https://covid19api.com/). 

## Fonctionnalités 

- L'application permet de visualiser les données (du jour et en cumulé depuis le début de la pandémie) 
  du nombre de cas déclarés, morts et guéris de la maladie, par pays, sous forme d'une table. 
  Chaque colonne est triable par ordre croissant/décroissant.
  
	![table](img/table.png?style=centerme)

- Il y a un filtre texte pour filtrer les pays affichés.
- Le contenu de la table est paginé.
- L'api limite le nombre de requêtes. Il faut mettre en place un cache 
  qui permette de ne pas réactualiser les données si elles
  datent de moins de 6 heures (ou plus ou moins). J'ai utilisé personnellement [localstorageDB](https://github.com/knadh/localStorageDB),
  qui permet de gérer l'information sous forme de "tables".
- Chaque pays est un lien qui amène à un graphique représentant l'évolution de la pandémie depuis le début.

	![graphe](img/graphe.png?style=centerme)

	![graphe](img/graphediff.png?style=centerme)


## Contraintes
- Mis en place d'un cache local pour éviter des requêtes trop nombreuses, et les requêtes
  qui n'aboutissent pas.
- Vous devrez écrire au moins 4 composants (tag) au sens du framework riot. Essayez
  de construire des composants le plus génériques possibles (la table notamment), et réutilisables
  dans un autre contexte.
- Séparer bien la partie qui géré les données (AJAX/BD) de la partie applicative.
- Les graphiques seront réalisés avec l'élément `canvas` d'html5. Là aussi, faites en sorte que le
  composant riot soit le plus générique possible. Les données présentées par les graphiques seront uniquement
  des moyennes glissées sur une semaine.
- Vous êtes libre d'utiliser un framework css.
- Vous pouvez utiliser un router (celui de riot est suffisant). Il doit y avoir plusieurs 
  routes (page principale, page détaillant un pays).


## Attendus
Votre projet devra être utilisable avec l'url 
`http://dwarves.iut-fbleau.fr/~login/covid19`
Vos sources seront disponibles dans un dêpot git `covid19`  sur dwarves.iut-fbleau.fr.


Le tout est à finaliser pour le **mardi  26 mars**. Vous ne pouvez pas vous mettre en binôme. 

