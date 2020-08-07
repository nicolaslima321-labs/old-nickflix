import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/Home.vue'
import SignUp from '../components/SignUp.vue'
import Login from '../components/Login.vue'
import About from '../components/About.vue'
import Contact from '../components/Contact.vue'
import Nav from '../components/Nav.vue'

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