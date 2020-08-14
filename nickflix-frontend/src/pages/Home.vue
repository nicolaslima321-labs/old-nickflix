<template>
  <div class="bg-picture-custom h-full">
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo">NICKFLIX</h1>
      <button class="mr-12 colored w-36 h-8 text-inline text-white font-bold py-2 px-4 rounded">
          Sign In
      </button>
    </header>
    <div class="flex flex-col items-center space-between pt-32 justify-center">
      <h1 class="text-white biggest-text max-w-2xl"><b>Unlimited discographies, music videos, and more.</b></h1>
      <h1 class="text-white middle-text"><b>Watch anywhere. Cancel anytime.</b></h1>

      <h1 class="pt-6 text-white middle-text"><b>Ready to watch? Enter your email to create or restart your membership.</b></h1>
      <div class="pt-6 pb-6 flex items-center justify-center w-full">
        <input v-model="email" class="w-4/12 mr-19 bg-gray-200 appearance-none border-2 border-gray-200 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="text" placeholder="Enter your E-mail" required>
        <button v-on:click="getStarted" class="colored w-2/12 h-12 text-inline text-white font-bold py-2 px-4">
          <div v-if="!isBusy" class="text-l">
            GET STARTED >
          </div>
          <div v-else class="flex items-center justify-center">
            <q-spinner-tail color="primary" size="2em" />
          </div>
        </button>
      </div>
    </div>
    <div class="h-16 mt-10">
      <a class="hidden">You cant see, but there is</a>
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
      isBusy: false,
      userIsAvailable: true,
    }
  },

  mounted () {

  },

  methods: {
    async getStarted () {
      this.isBusy = true

      await this.checkEmailIsAvailable()

      if(!this.userIsAvailable) {
        alert('Erro: E-mail inserido já está sendo utilizado!')
        this.userEmail = ''
        this.isBusy = false
        return
      }

      this.isBusy = false

      this.$router.push({
        component: 'signup',
        path: 'signup',
        query: { email: this.email },
      })
    },

    async checkEmailIsAvailable () {
      let user = { email: this.email }

      var self = this
      
      await axios.post(`${API}/user/available`, user)
        .then((response) => {
          console.log(response)
          self.userIsAvailable = true
        })
        .catch((error) => {
          console.log(error)
          self.userIsAvailable = false
        })
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