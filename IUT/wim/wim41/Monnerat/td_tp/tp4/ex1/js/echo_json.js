window.onload=(()=>{

	let ul = document.getElementById("listeMessages");
	let spinner = document.getElementById('spinner')
	let form = document.querySelector("form")

	form.addEventListener("submit",function(ev){
		ev.preventDefault();
		let message = {"message":this.message.value}
		let t=Date.now()

		let p = new Promise((resolve,reject)=>{
			spinner
				.classList
				.toggle("hide")

			let xhr=new XMLHttpRequest();
			xhr.onerror=(()=>{
				spinner
					.classList
					.toggle("hide")


				reject("Erreur !")
			})
			/*	xhr.ontimeout=(()=>{
				spinner
					.classList
					.toggle("hide")
				reject("Timeout !")
			})*/

			xhr.responseType  = "json"
			//	xhr.timeout = 100
			xhr.onload= function(){
				spinner
					.classList
					.toggle("hide")

				resolve
				({
					m: this.response.message ,
					time : Date.now()-t
				})
			}
			xhr.open("POST","./serveur.php");
			xhr.setRequestHeader("Content-type", "application/json");
			xhr.send(JSON.stringify(message));
		})

		p
			.then( (res) => {
				form.reset()
				let li = document.createElement("li")
				li.innerHTML=`${res.m} <kbd>${res.time}  ms ! </kbd>`
				ul.insertBefore(li,ul.firstChild)

			})
			.catch((res) => {
				form.reset()
				let li = document.createElement("li");
				li.innerHTML=res
				ul.insertBefore(li,ul.firstChild);
			})
	})
})

