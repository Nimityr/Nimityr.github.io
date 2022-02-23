<user>
<img class="image _text-center" src="{opts.user.picture.large}">
<div class="card-content">
	<h4 class="title">{opts.user.name.first} {opts.user.name.last}</h4>
	<p class="content">
		<address>{opts.user.location.street}<br>
			{opts.user.location.postcode} 
			{opts.user.location.city} 
			{opts.user.location.state}
		</address> 
	</p>
	<a href="mailto:{opts.user.email}">{opts.user.email}</a>
</div>
</user>
