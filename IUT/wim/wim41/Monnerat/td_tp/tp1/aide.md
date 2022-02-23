#### Images d'un document

```js
// DOM 0
for (let img of document.images){
	img.src = "on.png";
}
// DOM >=2
let images = document.querySelectorAll('img');
```


#### Nombre aléatoire

```js
let r=Math.random();
if (r<0.5) 
	console.log("Face");
else
	console.log("Pile");
```
#### Timers

```js
setTimeout(()=>console.log("3 secondes écoulées"),3000);

let i = setInterval(
	() => { 
		let d = (new Date()).toLocaleTimeString();
		document.getElementById("time").innerText = d;
	},
	1000)

setTimeout(()=>clearInterval(i),10000);
```

#### Réponse à un événement
```js
// inline DOM 0
img.onclick = function(){ console.log("clicked !")}

// DOM >= 2
img.addEventListener("click",()=>console.log("clicked"));

```


#### Itération d'un tableau

```js
let a = [1,2,3];

// forEach
a.forEach( elem => console.log(elem));

// for ... of 
// valable pour tous les itérables
//  Array, Map, Set, String, etc.

for (let elem of a){
	console.log(elem);
}
```


#### Tri d'un tableau

```js
const activities = [
  { title: 'Hiking', date: new Date('2019-06-28') },
  { title: 'Shopping', date: new Date('2019-06-10') },
  { title: 'Trekking', date: new Date('2019-06-22') }
]

const sortedActivities = activities.sort((a, b) => b.date - a.date);

```

#### Itération d'un tableau avec  map, filter, reduce et find.

```js
// map
const items = ['a', 'b', 'c']
const newArray = items.map((item) => performSomething(item))
const newArray = items.map(performSomething)

// find
const items = [
  { name: 'a', content: { /* ... */ }},
  { name: 'b', content: { /* ... */ }},
  { name: 'c', content: { /* ... */ }}
]
const b = items.find((item) => item.name === 'b')

//reduce
const items = [
  { name: 'a', content: { value: 1 }},
  { name: 'b', content: { value: 2 }},
  { name: 'c', content: { value: 3 }}
]

const count = items.reduce((result, elem ) => result + elem.content.value, 0)
// en decomposant l'objet !
const count = items.reduce((result, { content: { value } }) => result + value, 0)

```
