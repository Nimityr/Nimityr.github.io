
window.addEventListener(
	"load",
	()=>{

		let Model = {
			getContacts(){ 
				// completer
				return JSON.parse(localStorage.getItem('contacts'))||[]
			},
			saveContacts(arr){
				localStorage.setItem('contacts',JSON.stringify(arr))
				// completer
			}
		}

		let View ={

			table : document.querySelector("#contacts"),
			form  : document.getElementById("form"),
			sauver : document.getElementById("sauver"),

			getContactForm(){
			let fd = new FormData(this.form)
			return {
				"nom":fd.get('nom'),
				"prenom":fd.get('prenom'),
				"email":fd.get('email')
			}
				// completer
			},
			updateTable(cts){
				let fg = document.createElement("tbody")
				cts.forEach((ct)=>{	
					let tr = document.createElement("tr")
					for (p in ct){
						let td = document.createElement("td")
						let txt = document.createTextNode(ct[p])
						td.appendChild(txt)
						tr.appendChild(td)
					}
					fg.appendChild(tr)
				})

				this.table.replaceChild(fg,this.table.querySelector('tbody'))
			},
			suscribeSubmitForm(f){
				this.form.addEventListener("submit",(ev)=>{
				ev.preventDefault()
				let ct = this.getContactForm()
				f(ct)
				this.form.reset()

				})
				// completer
			},
			suscribeSaveTable(f){
				this.sauver.addEventListener('click',()=>{
				f()
				})
				// completer
			},
			suscribeClickTable(f){
				this.table.addEventListener('click',(ev)=>{
				let tr = ev.target.parentNode
					if (tr.rowIndex === 0) return
				let ct = {
					nom : tr.childNodes[0].textContent,
					prenom : tr.childNodes[1].textContent,
					email : tr.childNodes[2].textContent
				}
					f(ct)

				})
				// completer	
			}
		}


		let Controller  = {

			cts : [], // les contacts
			init(){
				View.suscribeSubmitForm((ct)=>{
					console.log(ct)
					if (!this.cts.find((el)=> el.email === ct.email)){
						this.cts.push(ct)
						View.updateTable(this.cts)
					}
					// completer
				})

				View.suscribeSaveTable(() => Model.saveContacts(this.cts))

				View.suscribeClickTable( (ct)=> {
					this.cts = this.cts.filter((el)=> el.email !== ct.email)
					View.updateTable(this.cts)
					// completer
				})

				this.cts = Model.getContacts()
				View.updateTable(this.cts)
			}
		}
		Controller.init()
	})


