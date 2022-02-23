function makeModel(){
		let model = {
			getContacts(){ 
				return JSON.parse(localStorage.getItem('contacts'))||[]
			},
			saveContacts(arr){
				localStorage.setItem('contacts',JSON.stringify(arr))
			}
		}
	return model
}
