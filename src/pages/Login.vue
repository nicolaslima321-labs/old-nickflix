<template>
  <div class="bg-picture-custom h-full">
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo">NICKFLIX</h1>
    </header>
    <div class="flex flex-col items-center space-between pt-6 pb-16 mt-2 justify-center">
      <div class="flex flex-col bg-login-custom p-8 pl-16 pr-16 w-4/12 rounded-bordered" >
        <label class="text-3xl font-bold text-white"><b>Entrar</b></label>
        <input v-model="email" class="text-sm mt-6 rounded h-12 pl-2" placeholder="E-mail ou Número de Telefone" />
        <input v-model="password" type="password" class="text-sm mt-6 rounded h-12 pl-2" placeholder="Senha" />
        <button class="mt-10 h-12 colored rounded text-white font-bold" v-on:click="login">
          <div v-if="!isBusy" class="text-l">
            Entrar
          </div>
          <div v-else class="flex items-center justify-center">
            <q-spinner-tail color="primary" size="2em" />
          </div>
        </button>
        <div class="pt-4 flex justify-between text-white">
          <input v-model="rememberMe" class="mr-2 leading-tight" type="checkbox"><label class="grey-text-color flex-1">Lembrar-me</label>
          <a class="grey-text-color" href="/">Need help?</a>
        </div>
        <p class="pt-16 grey-text-color">Novo no NickFlix?<a class="text-white" href="/"> Inscreva-se agora.</a></p>
      </div>
    </div>
  </div>
</template>

<script>
import { QSpinnerTail } from 'quasar'

import axios from 'axios'

const API = 'http://api.nickflix:8001/api'

export default {
  name: 'Home',

  components: {
    QSpinnerTail
  },

  data () {
    return {
      email: '',
      password: '',
      isBusy: false,
      rememberMe: '',
    }
  },

  methods: {
    gotoDashboard () {
      this.isBusy = false

      this.$router.push({
        component: 'dashboard',
        path: 'dashboard'
      })
    },

    login () {

      let user = { 
        email : this.email,
        password: this.password
      }

      let config = {}

      axios.post(`${API}/auth/login`, user, config)
        .then((response) => this.loginSuccess(response))
        .catch((error) => this.loginFailed(error))
    },

    loginSuccess (response) {
      let token = response.data.token
      setAuthorization(token)
      console.log(response)
    },

    loginFailed (error) {
      console.log(error)
    },

    setAuthorization (token) {
      localStorage.setItem("Authorization", `Bearer ${token}`)  
      localStorage.setItem("Remember", this.rememberMe)  
    }
  }
}
</script>

<style scoped>

  a:hover {
    text-decoration: underline;
  }

  body {
    background-image: url("../../public/primary-background.png");
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  .bg-login-custom {
    background-color: rgba(0,0,0, .7);
  }

  .rounded-bordered {
    border-radius: .5em;
    border-color: rgba(0,0,0, .7);
  }

  .container {
    display: 'flex';
    align-items: 'center';

  }

  .colored{
    background-color: #E50914;
  }

  .grey-text-color {
    color: #737373;
  }

  .biggest-text {
    font-size: 3.5em;
  }

  .middle-text {
    font-size: 1em;
  }

  .nickflix-logo {
    color: #E50914;
    font-size: 3em;
    font-family: 'Bebas Neue';
  }
</style>