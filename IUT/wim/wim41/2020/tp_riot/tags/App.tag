<app>
	<div grid="bottom">
		<div column="4">
			<form >
				<span each={sizes}>
					<input  checked={parent.size == size} onclick={_changeSize} value={size} name="size" type="radio"> {label} </span>
				
			</form>
		</div>
		<div column="+4 4">
			<form  onsubmit={search} class="_text-right">
				<input   ref="querySearch" class="_inline"  style="width:auto" type="text"><button><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>

	<div class="_mtxs" grid="justify-around">
		<button  onclick={_changeSel} each={types} column="2" class="{'-warning':name == type}">
			{label}
		</button>
	</div>
<div grid="justify-between" class="_mtxs">
	<div column class="_text-left">
		Notes 
		<a click={} href="" ><i class="fa fa-caret-down"></i></a> 
		<a  click={} href="" ><i class="fa fa-caret-up"></i></a> 

	</div>
	<div column class="_text-center _ts3"> 
		<a  href="#" click={}><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
		{currentPage} / {totalPages} 
		<a  href="#" click={}><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
	</div>
	<div column class="_text-right">
		Titres 
		<a click={}  href="#" ><i class="fa fa-caret-down"></i></a> 
		<a click={} href="#" ><i class="fa fa-caret-up"></i></a> 

	</div>
</div>


<spinner loading={loading}></spinner>

<div grid="top">
	<div each={f in films} column={size} class="_ps">
		<film  url="#toto" film={f} ></film>
	</div>
</div>

<script>
	this.mixin('serviceAjax');
var self=this;
this.currentPage=1;
this.totalPages=0;
this.type='popular';
this.size=4;
this.films = [];
this.querySearch=null;

this._changeSize=((e)=>{
	this.size = e.item.size;
	this.update();
	console.log(this.size);
});
this.loading = false;
this._changeSel=(e=>{
	this.type=e
		.item
		.name;

	this.getMovies();
});
this.search=((e)=>{
	e.preventDefault();

	this.type='search';
	this.currentPage=1;
	this.querySearch=this.refs.querySearch.value;
	this.getMovies();

});
this.getMovies = function(){
	this.loading=true;
	this.update();
	var that=this;
	this
		.getListMovies(this.currentPage,this.type,this.querySearch)
		.then(function(data){
			console.log(data);
			that.currentPage=data.page;
			that.films=data.results;
			that.totalPages=data.total_pages;
			that.loading=false;
			that.update();
		})
};
this.getMovies();
console.log("OK");
</script>
</app>
