import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'helloworldson',
      components: "Hi"
    },
    {
      path: '/login',
      name: 'helloworldson',
      components: "<h1>Hi</h1>"
    }
  ]
})