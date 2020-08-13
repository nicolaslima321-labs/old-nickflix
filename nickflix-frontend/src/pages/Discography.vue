<template>
  <div class="artist-background">
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

const API = 'http://api.nickflix:8000/api'

export default {
  name: 'Discography',

  components: {
    DiscographyPlayer,
    Navbar
  },

  data () {
    return {
      discographyId: this.$route.query.id,
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