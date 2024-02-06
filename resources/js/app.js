require('./bootstrap')

window.Vue = require('vue')

import router from './routes'

// require('vue2-animate/dist/vue2-animate.min.css')
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('post-header', require('./components/PostHeader.vue').default)
Vue.component('posts-list', require('./components/PostsList.vue').default)
Vue.component(
  'post-list-item',
  require('./components/PostListItem.vue').default
)
Vue.component('nav-bar', require('./components/NavBar.vue').default)
Vue.component('category-link', require('./components/CategoryLink.vue').default)
Vue.component('post-link', require('./components/PostLink.vue').default)
Vue.component('tag-link', require('./components/TagLink.vue').default)
Vue.component('disqus-comments', require('./components/DisqusComments.vue').default)
Vue.component('pagination-links', require('./components/PaginationLinks.vue').default)
Vue.component('paginator', require('./components/Paginator.vue').default)
Vue.component('social-links', require('./components/SocialLinks.vue').default)

const app = new Vue({
  el: '#app',
  router,
})
