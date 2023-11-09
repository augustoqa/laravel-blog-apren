<template>
	<section class="posts container">
		<!--  @if (isset($title))
            <h3></h3>
            @endif
    -->

		<article v-for="post in posts" class="post">
			<!-- @include($post->viewType('home')) -->

			<div class="content-post">
				<!-- @include('posts.header') -->
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gris">
							{{ post.published_date }} / {{ post.owner.name }}
						</span>
					</div>
					<!-- @if ($post->category) -->
					<div class="post-category">
						<span class="category">
							<!-- <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a> -->
							<a href="#">{{ post.category.name }}</a>
						</span>
					</div>
					<!-- @endif -->
				</header>

				<h1 v-text="post.title"></h1>

				<br />
				<div class="divider"></div>
				<br />

				<p v-html="post.excerpt"></p>
				<footer class="container-flex space-between">
					<div class="read-more">
						<a href="#" class="text-uppercase c-green">Leer más</a>
					</div>
					<div class="tags container-flex">
						<div class="tags container-flex">
							<span
								v-for="tag in post.tags"
								class="tag c-gray-1 text-capitalize"
							>
								#<a href="#">{{ tag.name }}</a>
							</span>
						</div>
					</div>
				</footer>
			</div>
		</article>
		<!-- @empty -->
		<article v-if="!posts.length" class="post">
			<div class="content-post">
				<h1>No hay publicaciones todavía.</h1>
			</div>
		</article>
		<!-- @endforelse -->
	</section>
	<!-- fin del div.posts.container -->

	<!-- $posts->appends(request()->all())->links()  -->
</template>

<script>
export default {
	data() {
		return {
			posts: [],
		}
	},
	mounted() {
		axios
			.get('/api/posts')
			.then((res) => {
				this.posts = res.data.data
			})
			.catch((err) => console.log(err))
	},
}
</script>
