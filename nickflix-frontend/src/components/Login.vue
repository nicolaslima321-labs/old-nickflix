<template>
  <div class="bg-picture-custom h-full">
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo">NICKFLIX</h1>
    </header>
    <div class="flex flex-col items-center space-between pt-16 pb-16 justify-center">
      <div class="custom-text bg-login-custom p-6 w-4/12 rounded-bordered" >
        <label class="text-xl text-white"><b>Entrar</b></label>
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
  body {
    background-image: url("../../public/primary-background.png");
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  .bg-login-custom {
    background-color: rgba(0,0,0, .5);
  }

  .rounded-bordered {
    border-radius: 1em;
    border-color: rgba(0,0,0, .5);
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