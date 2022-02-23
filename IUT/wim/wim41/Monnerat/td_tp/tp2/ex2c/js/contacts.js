window.addEventListener(
	"load",
	()=>{
		let Model = {
			getContacts(){ 
				// TODO
				return JSON.parse(localStorage.getItem("ctacts")) || []
			},
			saveContacts(arr){
				// TODO
				localStorage.setItem("ctacts",JSON.stringify(arr))
			}
		}

		let View ={

			tableContact : document.querySelector("#contacts"),
			formContact  : document.getElementById("form"),
			saveButton : document.getElementById("sauver"),

			getContactForm(){
				let fd = new FormData(this.formContact)
				return {
				nom : fd.get("nom"),
				prenom : fd.get("prenom"),
				email : fd.get("email")
				}
				// TODO
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
				this.tableContact.replaceChild(fg,this.tableContact.querySelector('tbody'))
			},
			suscribeSubmitForm(f){
				// TODO
					this.formContact.addEventListener("submit",(ev)=>{

						ev.preventDefault()
						f(this.getContactForm())
						this.formContact.reset()
						//f(???)
					})
			},
			suscribeSaveTable(f){
				// TODO
				this.saveButton.addEventListener('click',f)
			},
			suscribeClickTable(f){
				// TODO	
			}
		}


		let Controller  = {
			cts : [], // les contacts
			init(){
				View.suscribeSubmitForm((ct)=>{
					// TODO
					this.cts.push(ct)
					View.updateTable(this.cts)


				})

				View.suscribeSaveTable(() => {
					Model.saveContacts(this.cts)
					console.log(this)
				})

				View.suscribeClickTable( (ct)=> {
					// TODO
				})

				this.cts = Model.getContacts()
				View.updateTable(this.cts)
			}
		}
		Controller.init()
	})
