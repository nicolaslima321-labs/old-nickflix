<template>
  <div>
    <header class="flex items-center justify-between">
      <a href="/"><h1 class="pl-10 nickflix-logo">NICKFLIX</h1></a>
      <a class="pr-10 hover:underline" href=""><b>Entrar</b></a>
    </header>
    <hr>
    <div v-if="step == 1">
      <div class="flex flex-col items-center space-between pt-16 justify-center">
        <div class="w-4/12">
          <p class="font-thin ">PASSO <b>{{ step }}</b> DE <b>3</b>.</p>
          <h1 class="font-bold items-start text-2xl">Bem-vindo(a) de volta!</h1>
          <h1 class="font-bold items-start text-2xl">É fácil assinar a Netflix.</h1>
          <p class="font-thin">Informe sua senha para começar a assistir.</p>
        </div>
        <div class="w-4/12 flex flex-col pt-4 pb-4">
          <p class="font-thin">Email</p>
          <p class="font-bold">{{ userEmail }}</p>
        </div>
        <input v-model="password" class="w-4/12 h-14 mr-19 bg-transparent border border-gray-800 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="password" placeholder="Informe a Senha" required>
        <a class="text-blue-700 w-4/12 pt-6 hover:underline" href="/">Esqueceu a senha?</a>
        <button class="w-4/12 mt-6 h-12 colored rounded text-white" v-on:click="submit"> 
          CONTINUAR
        </button>
      </div>
    </div>
    <div v-if="step == 2">
      <div class="flex flex-col items-center space-between pt-16 justify-center">
        <h1>Crie uma senha para iniciar sua assinatura.</h1>
        <input v-model="userEmail" class="w-4/12 h-14 mr-19 bg-transparent border border-gray-800 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="text" placeholder="Insira seu E-mail">
        <button v-on:click="debug"> 
          teste
        </button>
      </div>
    </div>
    <div v-if="step == 3">
      <div class="flex flex-col items-center space-between pt-16 justify-center">
        <h1>Crie uma senha para iniciar sua assinatura.</h1>
        <input v-model="userEmail" class="w-4/12 h-14 mr-19 bg-transparent border border-gray-800 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="text" placeholder="Insira seu E-mail">
        <button v-on:click="debug"> 
          teste
        </button>
      </div>
    </div>
  </div>
</template>

<script>
// import { QSpinnerTail } from 'quasar'
// import axios from 'axios'

export default {
  name: 'SignUp',

  props: [
    'email'
  ],

  data () {
    return {
      userEmail: this.$route.query.email,
      password: '',
      step: 1,
      isBusy: null,
    }
  },

  mounted () {
    // console.log()
  },

  methods: {
    submit () {
      console.log(this.email)
    }
  }
}

</script>

<style scoped>
  .colored {
    background-color: #E50914;
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
    font-family: 'Bebas Neue';
  }

</style>