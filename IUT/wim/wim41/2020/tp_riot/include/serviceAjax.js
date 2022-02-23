function makeServiceAjax(){
var apikey="cfa0c70143839fc93f8bb1a919fd6a09";
var urlBase = "https://api.themoviedb.org/3";

var service = {
	getListMovies:getListMovies,
	getMovie:getMovie
};
function getMovie(id){
	var url = urlBase+"/movie/"+id+"?api_key="+apikey+"&append_to_response=credits&language=fr-FR";
	return new Promise(function(resolve,reject){
		http = new XMLHttpRequest();
		http.open("GET",url);
		http.responseType="json";
		http.send();
		http.onload=function(){
			resolve(this.response);
			

		};
		http.onerror=function(){
			reject("Erreur");
		};
	});
}

function getListMovies (page,type,query){
	switch(type){
		case 'popular' : 
			url = urlBase+"/movie/popular?api_key="+apikey+"&language=fr-FR&page="+page;
			break;
		case 'top_rated' :
			url = urlBase+"/movie/top_rated?api_key="+apikey+"&language=fr-FR&page="+page;
			break;
		case 'now_playing' :
			url = urlBase+"/movie/now_playing?api_key="+apikey+"&language=fr-FR&page="+page;
			break;
		case 'upcoming' :
			url = urlBase+"/movie/upcoming?api_key="+apikey+"&language=fr-FR&page="+page;
			break;
		case 'search':
			url = urlBase
				+"/search/movie?api_key="+apikey
				+"&language=fr-FR&page="+page
				+"&query="+query;
			break;

		default:
			url = urlBase+"/movie/popular?api_key="+apikey+"&language=fr-FR&page="+page;
	}
	return new Promise(function(resolve,reject){
		var http = new XMLHttpRequest();
		http.open("GET",url);
		http.responseType="json";
		http.send();
		http.onload=function(){
			resolve(http.response);

		};
		http.onerror=function(){
			reject("Erreur");
		};
	});


}
return service;
}
