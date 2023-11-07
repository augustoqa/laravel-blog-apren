<template>
	<section class="posts container">
		<!--  @if (isset($title))
            <h3></h3>
            @endif
            @forelse($posts as $post) -->
		<article class="post">
			<!-- @include($post->viewType('home')) -->

			<div class="content-post">
				<!-- @include('posts.header') -->

				Home
				<!-- <h1></h1> -->

				<br />
				<div class="divider"></div>
				<br />

				<!-- <p>{{ $post->excerpt }}</p> -->
				<footer class="container-flex space-between">
					<div class="read-more">
						<!-- <a href="" class="text-uppercase c-green">Leer más</a> -->
					</div>
					<div class="tags container-flex">
						<!-- @include('posts.tags') -->
					</div>
				</footer>
			</div>
		</article>
		<!-- @empty -->
		<article class="post">
			<div class="content-post">
				<h1>No hay publicaciones todavía.</h1>
			</div>
		</article>
		<!-- @endforelse -->
	</section>
	<!-- fin del div.posts.container -->

	<!-- $posts->appends(request()->all())->links()  -->
</template>
