#### XMLHttpRequest
```js
let xhr = new XMLHttpRequest()
xhr.open("GET","mon/url")

xhr.onload = ...
xhr.onerror = ...

xhr.send()
```
#### Promise
```js

let promise = new Promise ((resolve,reject) => {
		setTimeout(() => {
				resolve("OK")
				},1000)
	})
promise.then(data => ....)
```

#### async/await

```js

function getUser(email){
	return new Promise(...)
}

async function updateUser(){

	let user = await getUser(...)
	console.log(user)
}
```

