function Personne(nom,prenom,mail,age,amis){
	this.nom=nom||"";
	this.prenom=prenom||"";
	this.mail=mail||"";
	this.age=age||0;
	this.amis=amis||[];
}

var Denis=new Personne("Monnerat","Denis","monnerat@u-pec.fr",44);
var Pierre=new Personne("Valarcher","Pierre","valarcher@u-pec.fr",49);
var Didier=new Personne("Diaz","Didier","diaz@u-pec.fr",53);
var Luc=new Personne("Hernandez","Luc","hernandez@u-pec.fr",44);
var DeptInfo = [];


DeptInfo.push(Denis,Luc,Pierre,Didier);
//tri par age
// DeptInfo.sort((a,b)=>{
// 	return b.age-a.age;
// });

// tri par nom
DeptInfo.sort(function(a, b){
    if(a.nom < b.nom) { return -1; }
    if(a.nom > b.nom) { return 1; }
    return 0;
})

//nom en majuscule
DeptInfo = DeptInfo.map(p => {
p.nom = 	p.nom.toUpperCase();
	return p;
	
});

Personne.prototype.toHtmlRow=function(){
	return "<tr>"
			+"<td>"+this.nom+"</td>"
			+"<td>"+this.prenom+"</td>"
			+"<td>"+this.mail+"</td>"
			+"<td>"+this.age+"</td>"
			+"<td>"+this.amis+"</td>"
			+"</tr>";
}

Personne.prototype.ajouterAmi=function(ami){
	this.amis.push(ami);
}

//Amis

Didier.ajouterAmi("Pierre");
Didier.ajouterAmi("Jean");
Denis.ajouterAmi("Pierre");
Luc.ajouterAmi("Pierre");
Pierre.ajouterAmi("Pierre");


function AfficherTable(personnes){

document.writeln("<table class='_b1'><thead><th>Nom</th><th>Prénom</th><th>Mail</th><th>Age</th><th>Amis</th></thead>");
document.writeln("<tbody>");
	personnes.forEach(function(p){
		document.writeln(p.toHtmlRow());
		
	})
document.writeln("</tbody></table>");


function average(tab) {
    return tab.reduce((a, b) => {return a + b.age},0) / tab.length;
}


document.writeln("<p>Age Moyen : "+average(DeptInfo).toFixed(2)+"</p>");


}
