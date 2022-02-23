# TP javascript : riot.js

La [documentation](https://riot.js.org/) de riot.js 

#### Ex1
Reprendre l'exercice 2 du [tp2](./../tp2) (gestion de contacts) en utilisant riot.js. En particulier,
on utilisera 3 composants :

- `App.riot` : l'application principale, 
- `TableContacts.riot` : affichage des contacts sous forme d'une table,
- `FormContact.riot` : formulaire de saisie d'un nouveau contact.

Le contrôle de l'ensemble est assuré par le composant principale (`App.riot`).


#### Ex2
L'exercice 2 permet de faire une recherche de film en utilisant l'api
[OMDb](https://www.omdbapi.com/) (Open Movie Database). 


![search](./img/search.png?style=centerme)


Son utilisation nécessite une clé. 
Vous pouvez utiliser la mienne `2fcb2848`. Si la limite de requêtes est atteinte, générez votre propre clé.


Compléter le service ajax de recherche en utilisant l'api omdb (`service.js`), et le composant `search.riot`.


