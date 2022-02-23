<size>
<form >
	<label each={opts.sizes}><input  checked={opts.size == size} onclick={_changeSel} value={size} name="size" type="radio"> {label} </label>
</form>

this.mixin('bus');
this._changeSel=((e)=>{
	this.bus.trigger('size_change',e.item.size);

})
</size>
