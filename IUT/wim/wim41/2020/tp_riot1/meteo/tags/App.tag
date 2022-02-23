<app>

<spinner  loading="{loading}"></spinner>

<div grid>
	<div column="6">
		<form ref="form" onsubmit={_submit}> 
			<input 	ref="ville"   type="text" placeholder="Ville, Pays">
			<button id="valider" name="valider" class="btn">Chercher</button>
		</form> 
	</div>       
	<div column="6" id="resultat" if={data != null}>

		<h3 class='_c-base-primary'>{ville}</h3>

		// COMPLETEZ

	</div>
<script>
this.mixin('serviceAjax');
this.data=null;
this.ville = null;
this.loading = false;

this._submit=((ev)=>{
	ev.preventDefault();
	var where = this.refs.ville.value;
	this.loading=true;
	this.ville = where;
	this
		.getWeather(where)
		.then((rep)=>{
			this.data = rep;
			this.refs.form.reset();
			this.loading = false;
			this.update();
		},()=>{
			this.data=null;
			this.loading=false;
			this.update();
		});
})


filterDate(t){
	var d=new Date(t*1000);
	return d.toLocaleString();
}
</script>
</app>

