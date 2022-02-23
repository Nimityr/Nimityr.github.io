let liens= [ 
	{
	nom:"Google"  ,
	url:"www.google.fr",
	img:"https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/200px-Google_2015_logo.svg.png"	
},
	{
		nom:"Le Monde",
		url:"lemonde.fr",
		img:"https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Lemonde_fr_2005_logo.svg/200px-Lemonde_fr_2005_logo.svg.png?uselang=fr"

	},
	{
		nom:"L'Equipe",
		url:"www.lequipe.fr",
		img:"https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/L%27%C3%89quipe_wordmark.svg/200px-L%27%C3%89quipe_wordmark.svg.png"
	}
];
window.addEventListener("load",()=>{
	//document.body
	let body = document.querySelector("body")

	let ul = document.createElement("ul")
	for (lien of liens){
	let li = document.createElement('li')
	let a = document.createElement('a')
	let txt = document.createTextNode(lien.nom)
	a.href = `http://${lien.url}`
	a.appendChild(txt)
	li.appendChild(a)
	ul.appendChild(li)
	}
	body.appendChild(ul)
})
