<template>
  <div>
    <div class="custom-bg">
      <Navbar />
      <div class="pl-12 pb-32">
        <img class="linkinpark-logo-size" src="../assets/linkin-park-logo.png">
        <div class="w-3/12 text-justify pt-2 pb-8">
          <h1 class="text-gray-100 font-semibold">Linkin Park é uma banda de rock dos Estados Unidos formada em Agoura Hills, Califórnia. A formação atual da banda inclui o vocalista e multi-instrumentista Mike Shinoda, o guitarrista Brad Delson, o baixista Dave Farrell, o DJ Joe Hahn e o baterista Rob Bourdon, todos membros fundadores.</h1>
        </div>
        <button v-on:click="goToMainDiscography" class="rounded bg-white hover:bg-opacity-75 font-semibold p-2 pl-4 pr-4"><Play class="float-left pr-2"/>Watch</button>
        <button class="ml-4 rounded text-white bg-gray-600 custom-opacity font-semibold p-2 pl-4 pr-4"><InformationOutline class="float-left pr-2" />More Info</button>
      </div>
    </div>
    <div class="bg-black">
      <vueper-slides
        class="pt-16 pb-16"
        slide-image-inside
      >
        <vueper-slide v-for="i in 3" :key="i" :content="'Nickflixson'" :image="'https://avatars0.githubusercontent.com/u/23743072?s=460&u=cc978541fc3489dbf1cb45a96227672800f24485&v=4'" :style="'background-color: #000000'"/>
      </vueper-slides>
    </div>
  </div>
</template>

<script>
import Navbar from '../components/Navbar'
import { VueperSlides, VueperSlide } from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'

import InformationOutline from 'vue-material-design-icons/InformationOutline.vue'
import Play from 'vue-material-design-icons/Play.vue'

//  import { mdiWalletGiftcard } from '@mdi/js'
// import axios from 'axios'
// const API = 'http://api.nickflix:8000/api'

export default {
  name: 'Dashboard',

  components: {
    InformationOutline,
    Play,
    Navbar,
    VueperSlides,
    VueperSlide,
  },

  data () {
    return {
      profilePicFocused: false,
      slide: 1
    }
  },

  methods: {
    debug () {
      console.log("hovered")
    },

    goToMainDiscography () {
      this.$router.push({
        component: 'discography',
        path: 'discography',
        query: { id: 1 },
      })
    }
  }
}
</script>

<style lang="scss" scoped>

.custom-bg {
  background-image: url("../assets/Chester-Bennington_(DarkBG).png");
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.custom-opacity {
  background-color: rgba(109, 109, 110, 0.7);
}

.custom-opacity:hover {
  background-color: rgba(109, 109, 110, 0.6);
}

.linkinpark-logo-size {
  filter: invert(99%) sepia(1%) saturate(5%) hue-rotate(25deg) brightness(103%) contrast(102%);
  height: 25%;
  width: 25%;
}
</style>