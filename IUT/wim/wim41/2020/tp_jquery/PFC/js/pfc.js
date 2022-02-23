window.onload = (() => {
	let nbPartie = 0;
	let nbPartieGagne = 0;

	let feuille = document.getElementById("feuille");
	feuille.addEventListener('mouseover', Hover, false);
	feuille.addEventListener('mouseout', Out, false);

	let ciseaux = document.getElementById("ciseaux");
	ciseaux.addEventListener('mouseover', Hover, false);
	ciseaux.addEventListener('mouseout', Out, false);

	let pierre = document.getElementById("pierre");
	pierre.addEventListener('mouseover', Hover, false);
	pierre.addEventListener('mouseout', Out, false);

	feuille.addEventListener('click', Jouer, false);
	pierre.addEventListener('click', Jouer, false);
	ciseaux.addEventListener('click', Jouer, false);

	let recommencer = document.getElementById("new");
	recommencer.onclick = Reset;

	function Jouer(event) {
		console.log(event.target.getAttribute("id"));
		nbPartie++;
	  	document.getElementById("partie").innerHTML = "Parties : "+nbPartie;
	}

	function Reset() {
		nbPartie=0;
		nbPartieGagne=0;
		document.getElementById("partie").innerHTML = "Parties : "+nbPartie;
		document.getElementById("gagne").innerHTML = "GagnÃ©es : "+nbPartieGagne;
	}

	function Hover(event){
	  event.target.style.backgroundColor = "red";
	}

	function Out(event){
	  event.target.style.backgroundColor = "";
	}





})
