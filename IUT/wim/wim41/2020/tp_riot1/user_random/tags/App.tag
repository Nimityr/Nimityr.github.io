<app>

<spinner loading="{loading}"></spinner>

<h1 class="_bb1 _pbxs">Random users 
	<form onsubmit={_submit} class='_inline-block'><button>Refresh</button></form>
</h1>

<div grid="justify-between">
	
	<!-- COMPLETEZ -->

</div>

<script>
this.mixin('serviceAjax');
this.users=[];
this.loading = false;

this._submit=((ev)=>{ // on peut utiliser aussi _submit(ev){...}
	ev.preventDefault();
	this.getNewUsers();
})

this.getNewUsers=(()=>{
this.loading=true;
	this
		.getUsers()
		.then((rep)=>{
			this.users = rep;
			this.loading = false;
			this.update();
		},()=>{
			this.users=[];
			this.loading=false;
			this.update();
		});
})
this.getNewUsers();
</script>
</app>

