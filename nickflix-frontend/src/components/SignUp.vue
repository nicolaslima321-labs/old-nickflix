<template>
  <div>
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo">NICKFLIX</h1>
      <button class="mr-12 colored custom-text w-36 h-8 text-inline text-white font-bold py-2 px-4 rounded">
          Sign In
      </button>
    </header>
    <div class="flex flex-col items-center space-between pt-16 justify-center">
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
      isBusy: null,
    }
  },

  methods: {
    getStarted () {
      this.isBusy = true
      return true
    }
  }
}
</script>

<style>
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