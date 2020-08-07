<template>
  <div>
    <header class="flex items-center justify-between">
      <a href="/"><h1 class="pl-10 nickflix-logo">NICKFLIX</h1></a>
      <a class="pr-10 custom-text hover:underline" href=""><b>Entrar</b></a>
    </header>
    <hr>
    <div class="flex flex-col items-center space-between pt-16 justify-center">
      <h1>Crie uma senha para iniciar sua assinatura.</h1>
      <input v-model="userEmail" class="w-4/12 mr-19 bg-gray-200 appearance-none border-2 border-gray-200 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="text" placeholder="Insira seu E-mail">
      <button v-on:click="debug"> 
        teste
      </button>
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
      userEmail: this.email || '',
      isBusy: null,
    }
  },

  mounted () {
    console.log(this.email)
  },

  methods: {
    debug () {
      console.log(this.email)
    }
  }
}

</script>

<style scoped>
   .colored{
    background-color: #E50914;
  }

  .custom-text {
    font-family: 'Martel Sans';
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
  }
</style>