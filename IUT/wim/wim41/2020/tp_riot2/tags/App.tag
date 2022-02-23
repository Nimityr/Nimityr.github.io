<app>

	<!-- Spinner -->
<spinner loading="{loading}"></spinner>

<div if={main}>

	<!-- taille des affiches et champ de recherche -->

	<div grid="bottom">
		<div column="4">
			<size sizes={sizes} size={size}></size>
		</div>

		<div column="+4 4">
			<form  onsubmit={_search} class="_text-right">
				<input   ref="querySearch" class="_inline"  style="width:auto" type="text"><button><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>

	<!-- Selection de la catégorie -->

	<div class="_mtxs" grid="justify-around">
		<button  onclick={_changeSel} each={types} column="2" class="{'-warning':name == type}">
			{label}
		</button>
	</div>


	<div grid="justify-between" class="_mtxs">
		
		<!-- tri par note -->
		
		<div column class="_text-left">
			Notes 
			<a onclick={}><i class="fa fa-caret-down"></i></a> 
			<a  onclick={}><i class="fa fa-caret-up"></i></a> 
		</div>
		
		<!-- Pagination -->

		<div column class="_text-center _ts3"> 
			<a   onclick={_pageDec}><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
			{currentPage} / {totalPages} 
			<a   onclick={_pageInc}><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
		</div>
		
		<!-- tri par titre -->

		<div column class="_text-right">
			Titres 
			<a onclick={}><i class="fa fa-caret-down"></i></a> 
			<a onclick={}><i class="fa fa-caret-up"></i></a> 
		</div>
	</div>



	<!-- Afichage des films -->

	<div grid="top">
		<div each={f in films} column={size} class="_ps">
			<film  url="#film/{f.id}" film={f} ></film>
		</div>
	</div>
</div>

<script>

var self=this;

// Donnnés du controleur

this.main = true;
this.currentPage=1; // page en cours
this.totalPages=0;  // nb total de pages 
this.type='popular'; // categorie des films affichés
this.size=4;        // taille courante des vignettes
this.films = [];    // tableau des films
this.querySearch=null; // chaine de recherche
this.loading = false;  // booléen qui controle le spinner

this.mixin('serviceAjax');  // service ajax pour recuperer les données
this.mixin('bus');          // observable pour communiquer par evenement


// Evenements 

this
	.bus
	.on('size_change',(s)=>{
	this.size = s;
	this.update();
})



this._pageDec=((e)=>{
	e.preventDefault();
	
})

this._pageInc=((e)=>{
	e.preventDefault();
	
})


this._changeSel=(e=>{

});

this._search=((e)=>{
	e.preventDefault();
	});

// fonctions de recuperation des données

this.getMovies = function(){
	this.loading=true;
	this.update();
	var that=this;
	this
		.getListMovies(this.currentPage,this.type,this.querySearch)
		.then(function(data){
			that.currentPage=data.page;
			that.films=data.results;
			that.totalPages=data.total_pages;
			that.loading=false;
			that.update();
		})
};


this.getMovies();
</script>
</app>
