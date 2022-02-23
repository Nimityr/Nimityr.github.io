function makeServiceAjax(){
	var apiKey = "824124b860cfccde7a00b390636217a2";
	var urlBase = "http://api.openweathermap.org/data/2.5/weather";
	var service = {
		getWeather
	};

	function getWeather(where){
		var url=urlBase
			+'?q='+where+'&units=metric&lang=fr'
			+'&APPID='+apiKey;


		return new Promise(function(resolve,reject){
			http = new XMLHttpRequest();

			// COMPLETEZ
			
		});
	}
	return service;
}
