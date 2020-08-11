<template>
  <div class="artist-background">
    <header class="flex items-center justify-between">
      <h1 class="pl-10 nickflix-logo"><a href="/dashboard">NICKFLIX</a></h1>
      <div class="flex-1 justify-between">
        <a class="pl-12 text-sm text-white hover:text-gray-400" href="/">Home</a>
        <a class="pl-3 text-sm text-white hover:text-gray-400" href="/">Discographies</a>
        <a class="pl-3 text-sm text-white hover:text-gray-400" href="/">Most Recent</a>
        <a class="pl-3 text-sm text-white hover:text-gray-400" href="/">My List</a>
      </div>
      <div class="flex pr-10 pt-8 items-end">
        <a href="/"><Magnify class="mr-12 text-white"/></a>
        <a href="/"><WalletGiftcard class="mr-12 text-white"/></a>
        <a href="/"><Bell class="mr-12 text-white"/></a>
      </div>
      <img v-on:click="profilePicFocused = !profilePicFocused" src="../assets/generic-avatar.png" class="rounded-lg mt-4 mr-6 h-12 w-12" />
    </header>
    <div class="flex items-center justify-center">
      <DiscographyPlayer class="pt-12 pb-12" :srcDiscography="originUrl" />
    </div>
  </div>
</template>

<script>
import DiscographyPlayer from '../components/DiscographyPlayer'
// import axios from 'axios'

// const API = 'http://api.nickflix:8000/api'
const LinkinPark_URL = "https://www.youtube.com/embed/videoseries?list=PLIPEvF0Ga5Jz3J0Ttlf0uQAXeh9SER4W1"

export default {
  name: 'ProfileSelector',

  components: {
    DiscographyPlayer
  },

  data () {
    return {
      originUrl: LinkinPark_URL
    }
  },

  methods: {

  }
}
</script>

<style scoped>
.nickflix-logo {
  color: #E50914;
  font-size: 2em;
  font-family: 'Bebas Neue';
}
</style>