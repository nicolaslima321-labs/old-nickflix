import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../pages/Home.vue'
import SignUp from '../pages/SignUp.vue'
import Login from '../pages/Login.vue'
import About from '../pages/About.vue'
import Contact from '../pages/Contact.vue'
import Nav from '../pages/Nav.vue'

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { path: '/', component: Home },
    { path: '/signup', component: SignUp, props: true },
    { path: '/login', component: Login },
    { path: '/nav', component: Nav },
    { path: '/about', component: About },
    { path: '/contact', component: Contact }
  ]
});

export default router