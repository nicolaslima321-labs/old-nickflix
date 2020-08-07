<template>
  <div class="bg-picture-custom h-full">
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo">NICKFLIX</h1>
      <button class="mr-12 colored custom-text w-36 h-8 text-inline text-white font-bold py-2 px-4 rounded">
          Sign In
      </button>
    </header>
    <div class="flex flex-col items-center space-between pt-16 justify-center">
      <h1 class="text-white biggest-text custom-text max-w-2xl"><b>Unlimited discographies, music videos, and more.</b></h1>
      <h1 class="text-white middle-text custom-text"><b>Watch anywhere. Cancel anytime.</b></h1>

      <h1 class="pt-6 text-white middle-text custom-text"><b>Ready to watch? Enter your email to create or restart your membership.</b></h1>
      <div class="pt-6 pb-6 custom-text flex items-center justify-center w-full">
        <input v-model="email" class="w-4/12 mr-19 bg-gray-200 appearance-none border-2 border-gray-200 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="text" placeholder="Insira seu E-mail">
        <button v-on:click="getStarted" class="colored custom-text w-2/12 h-12 text-inline text-white font-bold py-2 px-4">
          <div v-if="!isBusy" class="text-l">
            GET STARTED >
          </div>
          <div v-else class="flex items-center justify-center">
            <q-spinner-tail color="primary" size="2em" />
          </div>
        </button>
      </div>
    </div>
    <div class="h-32">
      <a class="hidden">You cant see, but there is</a>
    </div>
    <div class="h-1">
      <a class="hidden">You cant see, but there is</a>
    </div>
    <div class="h-8">
      <a class="hidden">You cant see, but there is</a>
    </div>
  </div>
</template>

<script>
import { QSpinnerTail } from 'quasar'
// import axios from 'axios'

export default {
  name: 'Home',

  components: {
    QSpinnerTail
  },

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

<style>
  .bg-picture-custom {
    background-image: url("../../public/primary-background.png");
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
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