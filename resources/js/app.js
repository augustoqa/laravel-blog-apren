require('./bootstrap')

window.Vue = require('vue')

import router from './routes'

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

const app = new Vue({
  el: '#app',
  router,
})
