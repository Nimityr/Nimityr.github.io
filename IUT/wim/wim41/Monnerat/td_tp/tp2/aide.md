#### Selection d'éléments

```js
// le premier 
document.querySelector(".box");

// ou tous
document.querySelectorAll(".box");

// avec l'id

document.getElementById("toto");

// selection d'un élément dans un autre

let container = document.querySeletor('.container')
container.querySelector('.box')
```

#### Traverser le dom

```js
var box = document.querySelector(".box");
box.nextElementSibling;
box.previousElementSibling;
box.parentElement;
box.childNodes;
```

#### Création/insertion d'éléments

```js
let p = document.createElement('p');
p.textContent="blabla";
document
   .getElementById("myDiv")
   .appendChild(p);
```


#### Gestionnaire évènementiels

```js
document.querySelector(".button").addEventListener("click", (e) => { /* ... */ });
document.querySelector(".button").addEventListener("mouseenter", (e) => { /* ... */ });
document.addEventListener("keyup", (e) => { /* ... */ });
```

#### window/document prêt

```js

document.addEventListener("DOMContentLoaded",() = > { .....})
// le dom a été construit (on n'attend pas le chargement du css, images, etc.

windon.addEventListener('load',()=>{...})
// le dom est prêt et toutes les ressources ont été chargées.
```


#### Local storage

```js

localStorage.setItem('monChat', 'Tom');
let cat =  localStorage.getItem('myCat'); 
localStorage.clear();
```



#### Gestion du css depuis le DOM

```js
// Select the first .box and change its text color to #000
document.querySelector(".box").style.color = "#000";

// Set color to #000 and background to red
var box = document.querySelector(".box");
box.style.color = "#000";
box.style.backgroundColor = "red";

// Set all styles at once (and override any existing styles)
box.style.cssText = "color: #000; background-color: red";


// Hide and show an element by changing "display" to block and none
document.querySelector(".box").style.display = "none";
document.querySelector(".box").style.display = "block";

// Add, remove, and the toggle the "focus" class
var box = document.querySelector(".box");
box.classList.add("focus");
box.classList.remove("focus");
box.classList.toggle("focus");


box.classList.add("focus", "highlighted");
box.classList.remove("focus", "highlighted");

box.classList.add("focus", "highlighted");
box.classList.remove("focus", "highlighted");

```

