<template>
  <div class="bg-picture-custom h-full">
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo">NICKFLIX</h1>
    </header>
    <div class="flex flex-col items-center space-between pt-6 pb-16 justify-center">
      <div class="flex flex-col custom-text bg-login-custom p-8 pl-16 pr-16 w-4/12 rounded-bordered" >
        <label class="text-3xl font-bold text-white"><b>Entrar</b></label>
        <input v-model="email" class="text-sm mt-6 rounded h-12 pl-2" placeholder="E-mail ou Número de Telefone" />
        <input v-model="password" type="password" class="text-sm mt-6 rounded h-12 pl-2" placeholder="Senha" />
        <button class="mt-10 h-12 colored rounded text-white font-bold">Entrar</button>
        <div class="pt-4 flex justify-between text-white">
          <input class="mr-2 leading-tight" type="checkbox"><label class="grey-text-color flex-1">Lembrar-me</label>
          <a class="grey-text-color" href="/">Need help?</a>
        </div>
        <p class="pt-12 grey-text-color">Novo no NickFlix?<a class="text-white" href="/"> Inscreva-se agora.</a></p>
      </div>
    </div>
  </div>
</template>

<script>
// import { QSpinnerTail } from 'quasar'
// import axios from 'axios'

export default {
  name: 'Home',


  data () {
    return {
      email: '',
      isBusy: null,
    }
  },

  methods: {
    getStarted () {
      this.isBusy = true

      this.$router.push({
        component: 'signup',
        path: 'signup',
        params: () => ({ email: this.email })
      })

      return true
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

  .custom-text {
    font-family: 'Martel Sans';
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
    font-size: 4em;
  }
</style>