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
				<post-header :post="post"></post-header>

				<br />

				<p v-html="post.excerpt"></p>
				<footer class="container-flex space-between">
					<div class="read-more">
						<router-link
							:to="{ name: 'posts_show', params: { url: post.url } }"
							class="text-uppercase c-green"
							>Leer más</router-link
						>
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
			.get(`/api/categorias/${this.$route.params.category}`)
			.then((res) => {
				this.posts = res.data.data
			})
			.catch((err) => console.log(err))
	},
}
</script>
