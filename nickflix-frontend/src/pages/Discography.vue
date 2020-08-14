<template>
  <div class="artist-background" v-if="discography" :style="discography.background">
    <Navbar />
    <div class="flex items-center justify-center">
      <DiscographyPlayer class="pt-12 pb-12" :srcDiscography="originUrl" />
    </div>
  </div>
</template>

<script>
import axios from 'axios'

import DiscographyPlayer from '../components/DiscographyPlayer'
import Navbar from '../components/Navbar'

const API = 'http://api.nickflix:8001/api'

export default {
  name: 'Discography',

  components: {
    DiscographyPlayer,
    Navbar
  },

  data () {
    return {
      discographyId: this.$route.query.id,
      discography: null,
      originUrl: ''
    }
  },
  
  mounted () {
    this.loadDiscography()
  },

  methods: {
    loadDiscography () {
      axios.get(`${API}/discography/${this.discographyId}/`)
        .then((response) => this.loadDiscographySuccess(response))
        .catch((error) => this.loadDiscographyFailed(error))
    },

    loadDiscographySuccess (response) {
      console.log("Success! =]")
      console.log(response)
      this.discography = response.data
      console.log(this.discography)
      this.discography.background = { backgroundImage: `url(${this.discography.picture_url})` }
      this.originUrl = response.data.url_origin
    },

    loadDiscographyFailed (error) {
      console.log("Failed")
      console.log(error)
    },
  }
}
</script>

<style scoped>
.artist-background {
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