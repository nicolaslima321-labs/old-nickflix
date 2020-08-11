<template>
  <div>
    <div class="custom-bg">
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
      <ProfileDropMenu class="float-right" v-show="profilePicFocused" :options="options" />
      <div class="pl-12 pb-32">
        <img class="linkinpark-logo-size" src="../assets/linkin-park-logo.png">
        <div class="w-3/12 text-justify pt-2 pb-8">
          <h1 class="text-gray-100 font-semibold">Linkin Park é uma banda de rock dos Estados Unidos formada em Agoura Hills, Califórnia. A formação atual da banda inclui o vocalista e multi-instrumentista Mike Shinoda, o guitarrista Brad Delson, o baixista Dave Farrell, o DJ Joe Hahn e o baterista Rob Bourdon, todos membros fundadores.</h1>
        </div>
        <button class="rounded bg-white hover:bg-opacity-75 font-semibold p-2 pl-4 pr-4"><Play class="float-left pr-2"/>Watch</button>
        <button class="ml-4 rounded text-white bg-gray-600 custom-opacity font-semibold p-2 pl-4 pr-4"><InformationOutline class="float-left pr-2" />More Info</button>
      </div>
    </div>
    <div class="bg-black pb-64">
      testesddasdsaasasdads
    </div>
  </div>
</template>

<script>
// import { QIcon, Quasar } from 'quasar'
// import DiscographyPlayer from '../components/DiscographyPlayer'
// const LinkinPark_URL = "https://www.youtube.com/embed/videoseries?list=PLIPEvF0Ga5Jz3J0Ttlf0uQAXeh9SER4W1"

import ProfileDropMenu from '../components/ProfileDropMenu'

import Magnify from 'vue-material-design-icons/Magnify.vue'
import WalletGiftcard from 'vue-material-design-icons/WalletGiftcard.vue'
import Bell from 'vue-material-design-icons/Bell.vue'
import InformationOutline from 'vue-material-design-icons/InformationOutline.vue'
import Play from 'vue-material-design-icons/Play.vue'

//  import { mdiWalletGiftcard } from '@mdi/js'
// import axios from 'axios'

const BASE_URL = 'http://localhost:8081'
// const API = 'http://api.nickflix:8000/api'

export default {
  name: 'Dashboard',

  components: {
    Bell,
    // DiscographyPlayer,
    InformationOutline,
    Play,
    ProfileDropMenu,
    Magnify,
    WalletGiftcard,
  },

  data () {
    return {
      profilePicFocused: false,
      options: [ { id: 0, href: BASE_URL, name: "Conta", separator: true }, { id: 1, href: BASE_URL, name: "Configurações", separator: false } ]
    }
  },

  methods: {
    debug () {
      console.log("hovered")
    }
  }
}
</script>

<style lang="scss" scoped>

.custom-bg {
  background-color: rgba(0,0,0,0.5);
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

.nickflix-logo {
  color: #E50914;
  font-size: 2em;
  font-family: 'Bebas Neue';
}

.linkinpark-logo-size {
  filter: invert(99%) sepia(1%) saturate(5%) hue-rotate(25deg) brightness(103%) contrast(102%);
  height: 25%;
  width: 25%;
}
</style>