
function Person(name,firstname,email,age,friends){
	this.name = name||"";
	this.firstname = firstname||"";
	this.email = email||"";
	this.age = age||0;
	this.friends = friends||[];
}

let Denis = new Person("Monnerat","Denis","monnerat@u-pec.fr",44);
let Pierre = new Person("Valarcher","Pierre","valarcher@u-pec.fr",49);
let Didier = new Person("Diaz","Didier","diaz@u-pec.fr",53);
let Luc = new Person("Hernandez","Luc","hernandez@u-pec.fr",44);
let deptInfo = [];
let age = 0;

deptInfo.push(Denis,Luc,Pierre,Didier);

Person.prototype.toHtmlRow=function(){
	return 	`<tr>
	 <td>${this.name}</td>
		<td>${this.firstname}</td>
		<td>${this.email}</td>
		<td>${this.age}</td>
	</tr>`;
}

Person.prototype.addFriend = function(f){
	this.friends.push(f);
}
Person.prototype.addFriend = function(f){
	this.friends.push(f);
}

Person.printTable=function (persons,node){
	let sTable = '';	
	sTable+="<table><thead><th>Nom</th><th>Prénom</th><th>Mail</th><th>Age</th></thead><tbody>";
	for (p of persons) sTable += p.toHtmlRow();
	sTable +="</tbody></table>";
	node.innerHTML = sTable;
}

