# TP javascript : élément canvas et dom.
#### Ex1
Le but est de pouvoir afficher un graphique (un camembert) représentant des données chiffrées. Les données seront décrites sous forme json, de la manière suivante :

```js			
let data=[
{"label":"C","value":50},
{"label":"C++","value":100},
{"label":"Java","value":20},
{"label":"PHP","value":60}
];
```

![camembert](./img/camembert.png?style=centerme)


#### Ex2 
Écrire une page qui anime un ensemble de ballons qui rebondissent sur les bords de la
fenêtre du navigateur.

Faites en sorte que les ballons proches (choisir vous-même une zone rectangulaire centrée aux coordonnées de la souris) de la position de la souris voient leur rayon augmenter
jusqu'à la valeur `maxRadius`.

![ballon](./img/ballon.png?style=centerme)

#### Ex3
Un alien en haut de la fenêtre se déplace horizontalement
d'un bord de la fenêtre à l'autre.

Votre vaisseau se déplace également en bas de la fenêtre. Vous pouvez changer sa direction avec
les flèches gauche/droite, et tirer  un missile (espace) pour le détruire l'alien. ~~On ne peut pas
tirer un nouveau missile tant que le précédent est toujours dans la scène~~ Le nombre de missiles tirés est
quelconque.

![ship](./img/space_invader.png?style=centerme)
![explosion](./img/explosion.png?style=centerme)
![missile](./img/missile.png?style=centerme)



Vois disposez "d'une classe" :
- `Element` qui représente un objet de la scène,
- `Sprite`, qui dérive de `Element`, représenté avec une image,
- `Missile`, qui dérive de `Element`, représenté par un rectangle plein.


Les méthodes que vous devez compléter :

```js
// dans element.js
update()
draw()
collision()
```
et la boucle évenementielle du jeu
```js

const animate = (t)=>{

}
```




