#### Canvas
```html
<body>
    <canvas></canvas>
</body>
```

```js
const canvas = document.querySelector('canvas')
canvas.width = window.innerWidth
canvas.height = window.innerHeight
const ctx = canvas.getContext('2d')
```

#### Dessin 
```js
ctx.beginPath()
ctx.arc(150, 150, 100, 0, Math.PI * 2, false)
ctx.strokeStyle = 'black'
ctx.stroke()
ctx.fillStyle = '#046975'
ctx.fill()
```

#### Animation
```js
let fps = 60 
let time = 0 
let dt = 1000/fps

const animate = (t) => {

	if (t-time > dt){
		//
		// update !
		//
		time = t
	}
	requestAnimationFrame(animate)
}

// first request
requestAnimationFrame(animate)
```


