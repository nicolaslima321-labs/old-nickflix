<template>
  <div>
    <header class="flex items-center justify-between">
      <a href="/"><h1 class="pl-10 nickflix-logo">NICKFLIX</h1></a>
      <a class="pr-10 hover:underline" href="/login"><b>Sign In</b></a>
    </header>
    <hr>
    <div v-show="step == 1" class="pb-16">
      <div class="flex flex-col items-center space-between pt-16 justify-center">
        <div class="w-4/12">
          <p class="font-thin ">STEP <b>{{ step }}</b> OF <b>3</b>.</p>
          <h1 class="font-bold items-start text-2xl">Welcome Back!</h1>
          <h1 class="font-bold items-start text-2xl">Its easy sign NickFlix.</h1>
          <p class="font-thin">Enter your password and start to watch.</p>
        </div>
        <div class="w-4/12 flex flex-col pt-4 pb-4">
          <p class="font-thin">Email</p>
          <p class="font-bold">{{ userEmail }}</p>
        </div>
        <input v-model="password" class="w-4/12 h-14 mr-19 bg-transparent border border-gray-800 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" type="password" placeholder="Enter your Password" required>
        <a class="text-blue-700 w-4/12 pt-6 hover:underline" href="/">Forgot your password?</a>
        <button class="w-4/12 mt-6 h-12 colored rounded text-white" v-on:click="submit" :disabled="isBusy"> 
          <div v-if="!isBusy" class="text-l">
            CONTINUE
          </div>
          <div v-else class="flex items-center justify-center">
            <q-spinner-tail color="primary" size="2em" />
          </div>
        </button>
      </div>
    </div>
    <div v-show="step == 2" class="pb-16">
      <div class="flex flex-col items-center space-between pt-16 justify-center">
        <div class="w-4/12">
          <p class="font-thin ">STEP <b>{{ step }}</b> OF <b>3</b>.</p>
          <h1 class="font-bold items-start text-2xl">Just few more steps to Nickflix</h1>
          <h1 class="font-bold items-start text-2xl">Enter the informations below.</h1>
        </div>
        <input v-model="name" class="w-4/12 h-12 mt-4 bg-transparent border border-gray-800 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" placeholder="Enter your name" required>
        <input v-model="lastName" class="w-4/12 h-12 mt-4 bg-transparent border border-gray-800 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" placeholder="Enter your last name" required>
        <input v-model="birthday" v-mask="'##/##/####'" masked="true" class="w-4/12 h-12 mt-4 bg-transparent border border-gray-800 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" placeholder="Enter your birthday" required>
        <input v-model="music" class="w-4/12 h-12 mt-4 bg-transparent border border-gray-800 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-grey-500" id="inline-full-name" placeholder="Enter your favorit music genre" required>
        <button class="w-4/12 mt-6 h-12 colored rounded text-white" v-on:click="submit" :disabled="isBusy"> 
          <div v-if="!isBusy" class="text-l">
            CONTINUE
          </div>
          <div v-else class="flex items-center justify-center">
            <q-spinner-tail color="primary" size="2em" />
          </div>
        </button>
      </div>
    </div>
    <div v-show="step == 3" class="pb-16">
      <div class="flex flex-col items-center space-between pt-16 justify-center">
        <div class="w-4/12">
          <p class="font-thin ">STEP <b>{{ step }}</b> OF <b>3</b>.</p>
          <h1 class="font-bold items-start text-2xl">Just a little to Nickflix</h1>
          <h1 class="font-bold items-start text-2xl">Finally go ahead with this button.</h1>
        </div>
        <button class="w-4/12 mt-6 h-12 colored rounded text-white" v-on:click="submitCreation" :disabled="isBusy"> 
          <div v-if="!isBusy" class="text-l">
            SUBMIT CREATION
          </div>
          <div v-else class="flex items-center justify-center">
            Wait untill finish.. <q-spinner-tail color="primary" size="2em" />
          </div>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { QSpinnerTail } from 'quasar'
import axios from 'axios'
import { mask } from 'vue-the-mask'

const API = 'http://api.nickflix:8001/api'

export default {
  name: 'SignUp',

  directives: {
    mask
  },

  components: {
    QSpinnerTail
  },

  props: [
    'email'
  ],

  data () {
    return {
      userEmail: this.$route.query.email,
      password: '',
      name: '',
      lastName: '',
      birthday: '',
      music: '',
      step: 1,
      isBusy: false,
    }
  },

  mounted () {
    // console.log()
  },

  methods: {
    submit () {
      this.isBusy = true

      setTimeout(() => {
        this.isBusy = false
        this.step += 1
      }, 3000)
    },

    async submitCreation () {
      let user = {
        name: this.name,
        last_name: this.lastName,
        birthday: this.birthday,
        email: this.userEmail,
        password: this.password,
        music_genre: this.music,
      }

      await axios.post(`${API}/user/signup`, user)
        .then((response) => this.creationSuccess(response))
        .catch((error) => this.creationFailed(error))

    },

    creationSuccess () {
      console.log("Go to Dashboard")
    },

    creationFailed () {
      console.log("Something goes wrong")
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