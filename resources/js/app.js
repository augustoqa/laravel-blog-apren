require('./bootstrap')

window.Vue = require('vue')

import Router from 'vue-router'
import Home from './views/Home'
import About from './views/About'
import Archive from './views/Archive'
import Contact from './views/Contact'

Vue.use(Router)

const router = new Router({
  routes: [
    {
      path: '/',
      component: Home,
    },
    {
      path: '/contacto',
      component: Contact,
    },
    {
      path: '/nosotros',
      component: About,
    },
    {
      path: '/archivo',
      component: Archive,
    },
  ],
  linkExactActiveClass: 'active',
})

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
  'example-component',
  require('./components/ExampleComponent.vue').default
)

const app = new Vue({
  el: '#app',
  router,
})
