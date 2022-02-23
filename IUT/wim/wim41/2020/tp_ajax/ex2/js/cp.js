// A complèter

window.onload = (() => {
	document.getElementById("codep").onblur =
		function() {
			let codep = this.value;
			let err = document.getElementById("nt");
			var p = new Promise((resolve, reject) => {
				var ajax = new XMLHttpRequest;
				let working = document.getElementById("working")
				ajax.open("GET", "./js/cp-" + codep + ".js");
				ajax.responseType = "json";
				ajax.send();
				ajax.onprogress = (()=>{
					working.className = "fa fa-refresh fa-spin fa-fw";
				})
				ajax.onload = (()=>{
					resolve(ajax.response);
					working.className = "";
				})
				ajax.onerror = (()=>{
					reject();
					working.className = "";
				})
			})

			p.then((rep)=>{
				err.style = "display:none";
				
				document.getElementById("departement").value = rep.codep.departement;
				let ville = document.getElementById("villes");
				let info = document.getElementById("indication");

				while (ville.firstChild) {
					ville.removeChild(ville.firstChild);
				}

				if ((typeof rep.codep.ville) == "string") {
					console.log("yes");
					let option = document.createElement("option");
					option.value = rep.codep.ville;
					option.textContent = rep.codep.ville;
					ville.appendChild(option);

					info.textContent = "1 commune correspondante";
					
				} else {
					for (var index = 0; index < rep.codep.ville.length; index++) {
						let option = document.createElement("option");
						const element = rep.codep.ville[index];
						option.value = element;
						option.textContent = element;
						ville.appendChild(option);
					}
					info.textContent = index + " commune correspondante";
				}
				
			}).catch((rep)=>{
				document.getElementById("departement").value = "";
				let ville = document.getElementById("villes");
				let info = document.getElementById("indication");
				while (ville.firstChild) {
					ville.removeChild(ville.firstChild);
				}
				info.textContent = "";
				err.style = "display:block";
			})
		}
})