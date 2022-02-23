function makeServiceAjax(){
	var urlApi = "https://randomuser.me/api";
	var service = {
		"getUsers":getUsers
	};

	function getUsers(){
		var url=urlApi+"?page=1&results=6&nat=fr";
		return new Promise(function(resolve,reject){
			http = new XMLHttpRequest();

		// COMPLETEZ
			
		});
	}
	return service;
}
