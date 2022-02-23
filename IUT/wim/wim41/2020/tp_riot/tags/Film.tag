<film>

	<!--div column={size} class="_ps"-->
	<div class="card-box _text-center">
		<a href="#">
			<img 
			class="image" hide={!film.poster_path}
			src="http://image.tmdb.org/t/p/w342/{film.poster_path}">
		</a>
		<div class="card-content">
			{film.vote_average}
			<h5 class="title"><a href="#">{film.title}</a></h5>
			<div>
				<span class="tag-box _mrxs"  each={id in film.genre_ids}>
					{genre(id)}
				</span>
			</div>

		</div>
	</div>
	<!--/div-->

	this.film = opts.film;
	this.size = opts.size;

</film>
