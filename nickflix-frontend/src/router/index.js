import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../pages/Home.vue'
import SignUp from '../pages/SignUp.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Dashboard.vue'
import Discography from '../pages/Discography.vue'

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { path: '/', component: Home },
    { path: '/signup', component: SignUp },
    { path: '/login', component: Login },
    { path: '/dashboard', component: Dashboard },
    { path: '/discography', component: Discography },
  ]
});

export default router