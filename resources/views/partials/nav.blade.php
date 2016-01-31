<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/dashboard">Dashboard</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="/articles">Articles</a>
				</li>
				<li>
					<a href="/articles/create">Create Article</a>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
			{{-- Commentted | JCE | For Showing Latest Article;
				<li>
					{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}
				</li>
			--}}

			</ul>
		</div>
	</div>
</nav>