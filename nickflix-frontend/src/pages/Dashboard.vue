<template>
  <div>
    <div class="custom-bg">
      <header class="flex items-center justify-between">
        <h1 class="pl-10 pt-2 nickflix-logo"><a href="/dashboard">NICKFLIX</a></h1>
        <div class="flex-1 justify-between font-semibold">
          <a class="pl-8 text-sm text-white hover:text-gray-400" href="/">Home</a>
          <a class="pl-3 text-sm text-white hover:text-gray-400" href="/">Discographies</a>
          <a class="pl-3 text-sm text-white hover:text-gray-400" href="/">Most Recent</a>
          <a class="pl-3 text-sm text-white hover:text-gray-400" href="/">My List</a>
        </div>
        <div class="flex pr-10 items-end">
          <a href="/"><Magnify class="mr-12 text-white"/></a>
          <a href="/"><WalletGiftcard class="mr-12 text-white"/></a>
          <a href="/"><Bell class="mr-12 text-white"/></a>
        </div>
        <img v-on:click="profilePicFocused = !profilePicFocused" src="../assets/generic-avatar.png" class="rounded-lg mt-4 mr-6 h-16 w-16" />
      </header>
      <ProfileDropMenu class="float-right" v-show="profilePicFocused" :options="options" />
      <div class="pl-8 ml-2 h-64 mb-64">
        <img class="linkinpark-logo-size" src="../assets/linkin-park-logo.png">
      </div>
      <div class="h-64 mt-64">
        <h1 class="text-xl">ALGUM TECXTO MTO FODA</h1>
      </div>
    </div>
    <div>
      teste
    </div>
  </div>
</template>

<script>
// import { QIcon, Quasar } from 'quasar'
import ProfileDropMenu from '../components/ProfileDropMenu'

import Magnify from 'vue-material-design-icons/Magnify.vue'
import WalletGiftcard from 'vue-material-design-icons/WalletGiftcard.vue'
import Bell from 'vue-material-design-icons/Bell.vue'
//  import { mdiWalletGiftcard } from '@mdi/js'
// import axios from 'axios'

const BASE_URL = 'http://localhost:8081'
// const API = 'http://api.nickflix:8000/api'

export default {
  name: 'Dashboard',

  components: {
    ProfileDropMenu,
    Magnify,
    WalletGiftcard,
    Bell
  },

  data () {
    return {
      profilePicFocused: false,
      options: [ { id: 0, href: BASE_URL, name: "Conta" }, { id: 1, href: BASE_URL, name: "Configurações" } ]
    }
  },

  methods: {
    debug () {
      console.log("hovered")
    }
  }
}
</script>

<style scoped>

.custom-bg {
  background-color: rgba(0,0,0,0.5);
  background-image: url("../assets/linkinpark-main-background.png");
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

.linkinpark-logo-size {
  max-height: 131;
  max-width: 93;
}
</style>