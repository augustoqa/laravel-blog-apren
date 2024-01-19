<template>
	<section class="posts container">
		<!--  @if (isset($title))
            <h3></h3>
            @endif
    -->

		<posts-list :posts="posts"></posts-list>

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
	props: ['category'],
	data() {
		return {
			posts: [],
		}
	},
	mounted() {
		axios
			.get(`/api/categorias/${this.category}`)
			.then((res) => {
				this.posts = res.data.data
			})
			.catch((err) => console.log(err))
	},
}
</script>
