<template>
  <div class="artist-background">
    <Navbar />
    <div class="flex items-center justify-center">
      <DiscographyPlayer class="pt-12 pb-12" :srcDiscography="originUrl" />
    </div>
  </div>
</template>

<script>
import DiscographyPlayer from '../components/DiscographyPlayer'
import Navbar from '../components/Navbar'
// import axios from 'axios'

// const API = 'http://api.nickflix:8000/api'
const LinkinPark_URL = "https://www.youtube.com/embed/videoseries?list=PLIPEvF0Ga5Jz3J0Ttlf0uQAXeh9SER4W1"

export default {
  name: 'ProfileSelector',

  components: {
    DiscographyPlayer,
    Navbar
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
.artist-background {
  background-image: url("../assets/Chester-Bennington_(DarkBG).png");
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.nickflix-logo {
  color: #E50914;
  font-size: 2em;
  font-family: 'Bebas Neue';
}
</style>