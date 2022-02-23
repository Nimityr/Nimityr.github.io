<film>

<div class="card-box _text-center">
	<a href={url}>
		<img 
	  class="image" hide={!film.poster_path}
   src="http://image.tmdb.org/t/p/w342/{film.poster_path}">
	</a>
	<div class="card-content">
		{film.vote_average}
		<h5 class="title"><a href={url}>{film.title}</a></h5>
	</div>
</div>

this.film = opts.film;
this.size = opts.size;
this.url = opts.url;
</film>
