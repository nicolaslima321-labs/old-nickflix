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
      <div class="p-16">
        <h1 class="p-2 text-white font-semibold text-2xl">Principais Discografias</h1>

        <slider animation="fade">
          <slider-item
            v-for="(discography, index) in discographies"
            :key="index"
            :style="discography"
            @click="goToDiscography(discography)"
          >
            <div class="flex self-center justify-center items-center h-64 cursor-pointer">
              <a class="text-white text-2xl hover:bg-opacity-50 font-semibold bg-black bg-opacity-75 rounded-lg p-3">
                {{ discography.artist }}
              </a>
            </div>
          </slider-item>
        </slider>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../components/Navbar'
// import { VueperSlides, VueperSlide } from 'vueperslides'
import { Slider, SliderItem } from 'vue-easy-slider'

import 'vueperslides/dist/vueperslides.css'

import InformationOutline from 'vue-material-design-icons/InformationOutline.vue'
import Play from 'vue-material-design-icons/Play.vue'

//  import { mdiWalletGiftcard } from '@mdi/js'
import axios from 'axios'
const API = 'http://api.nickflix:8001/api'

export default {
  name: 'Dashboard',

  components: {
    InformationOutline,
    Play,
    Navbar,
    // VueperSlides,
    // VueperSlide,
    Slider,
    SliderItem,
  },

  data () {
    return {
      profilePicFocused: false,
      slide: 1,
      discographies: null,
    }
  },

  mounted () {
    this.loadDiscographies()

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
    },

    goToDiscography (discography) {
      this.$router.push({
        component: 'discography',
        path: 'discography',
        query: { id: discography.id },
      })
    },

    loadDiscographies () {
      axios.get(`${API}/discography/`)
        .then((response) => this.loadDiscographiesSuccess(response))
        .catch((error) => this.loadDiscographiesFailed(error))
      },

      loadDiscographiesSuccess (response) {
        console.log("Success! =]")
        console.log(response)
        let discographiesCollection = response.data.result

        this.discographies = discographiesCollection.map(function(discography) {
          return {
            id: discography.id,
            artist: discography.artist,
            backgroundImage: `url(${discography.picture_url})`, 
            backgroundSize: 'cover',
            backgroundPosition: '55% 35%',
            padding: "",
            width: '100%', 
            height: '100%'
          }
        })
      },

      loadDiscographiesFailed (error) {
        console.log("Failed")
        console.log(error)
      },
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