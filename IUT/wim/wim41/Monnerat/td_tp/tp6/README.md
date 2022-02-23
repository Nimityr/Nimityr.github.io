# TP javascript : Nodejs

#### Installation de Nodejs

 1. Récupérez les [binaires](https://nodejs.org/en/download/) pour Linux.
 2. Désarchivez-les sur votre compte. Vous devriez avoir l'arborescence suivante :
   
		bin  CHANGELOG.md  include  lib  LICENSE  README.md  share

    Le repertoire `bin` contient (entre autres) les binaires exécutables `node` et `npm`.  

 3. À l'aide de la commande `npm`, installez le module `express` dont on aura besoin pour la suite.

		npm install express

    L'installation des modules se fait dans le repertoire `ǹode_modules` à la racine de votre compte. C'est
    là que `node` va les chercher par défaut.  
    Vous pouvez les installer à un autre endroit (option `--prefix` de `npm` et variable d'environnement
    `ǸODE_PATH` pour `ǹode`)  

 4. Testez votre installation avec un serveur http minimaliste : `ǹode app.js`

		// app.js

		const http = require('http');

		const port = 3000;

		const server = http.createServer((req, res) => {
		  res.statusCode = 200;
		  res.setHeader('Content-Type', 'text/plain');
		  res.end('Hello World');
		});

		server.listen(port, () => {
		  console.log(`Server running at *:${port}/`);
		});


#### Ex1 
Un serveur web pour notre application de gestion de contacts.

On va utiliser pour cela le module [express](https://expressjs.com/fr/4x/api.html). `express` facilite l'écriture
d'une application web en gérant notamment le routage et les entrées/sorties http.


```js
let express = require('express');
let app = express();


app.get('/', function(req, res){
res.sendFile(__dirname+"/html/contacts.html");
});

//app.use(express.static('html'));
app.use('/css',express.static('css'));
app.use('/js',express.static('js'));
app.use('/img',express.static('img'));
app.use('/tags',express.static('tags'));

app.listen( 3000 ,()=>{
	console.log('listening on *:3000');
})
```
- Notre serveur web possède une seule route : sa racine. Il renvoie le fichier `html/contacts.html`
- `app.use` permet d'enregistrer un middleware quelconque. Une fonction exécutée quand la route d'une requête 
   correspond à un path donné.
  ici, on utlise le middleware interne  `express.static` qui permet de servir du contenu statique. Pour notre application,
  le contenu des repértoires `css`, `js`, `img` et `tags`.

L'application devrait accessible et utlisable à l'url `http://localhost:3000`. Testez.



On va mettre en oeuvre avec notre serveur nodejs une petite api rest pour gérer les contacts de l'application.


Le serveur maintiendra lui-même l'ensemble des contacts.

```js
const contacts  = require('./contacts.json')
```

Les contacts sont maintenant représentés par la structure suivante :

```js
{ "id" : 1 , "nom" : "monnerat" , "prenom" : "denis" , "email" : "monnerat@u-pec.fr" }
```

On va ajouter au serveur les routes suivantes :

|  route        |      méthode      |  action                                  |
|----------     |:------------- |:------                                       |
| /contacts     |      GET      | renvoie le tableau de tous les contacts      |
| /contacts     |      POST     |    ajoute un contact, et renvoie le tableau  |
| /contacts/:id |      GET      |   renvoie un contact                         |
| /contacts/:id |      DELETE   | efface un contact, et renvoie le tableau     |
| /contacts/:id |      PUT      | modifie un contact, et renvoie le tableau    |

Les entrées/sorties de l'api seront formatées en JSON.


Voici l'implation de la première route :

```js
const contacts  = require('./contacts.json')

// Middleware
app.use(express.json())

app.get('/contacts', (req,res) => {
	res.status(200).json(contacts)
})
```

Implantez les autres routes, et modifiez le code de l'application pour utliser cette api.

