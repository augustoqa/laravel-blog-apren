<template>
	<article class="post">
		<!-- @include($post->viewType('home')) -->

		<div class="content-post">
			<!-- @include('posts.header') -->
			<post-header :post="post"></post-header>

			<br />

			<p v-html="post.excerpt"></p>
			<footer class="container-flex space-between">
				<div class="read-more">
					<post-link :post="post" class="text-uppercase c-green">Leer más</post-link>
				</div>
				<div class="tags container-flex">
					<div class="tags container-flex">
						<span v-for="tag in post.tags" class="tag c-gray-1 text-capitalize">
							<router-link
								:to="{ name: 'tags_posts', params: { tag: tag.url } }"
							>
								#{{ tag.name }}
							</router-link>
						</span>
					</div>
				</div>
			</footer>
		</div>
	</article>
</template>

<script>
export default {
	props: ['post'],
}
</script>
