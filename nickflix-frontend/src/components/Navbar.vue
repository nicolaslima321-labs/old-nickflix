<template>
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
    <ProfileDropMenu class="float-right" v-show="profilePicFocused" :options="options" />
  </header>
</template>

<script>
import ProfileDropMenu from '../components/ProfileDropMenu'

import Magnify from 'vue-material-design-icons/Magnify.vue'
import WalletGiftcard from 'vue-material-design-icons/WalletGiftcard.vue'
import Bell from 'vue-material-design-icons/Bell.vue'

export default {
  name: 'Navbar',

  components: {
    Bell,
    ProfileDropMenu,
    Magnify,
    WalletGiftcard,
  },

  data () {
    return {
      profilePicFocused: false,
    }
  },

  methods: {

  }
}
</script>

<style scoped>
</style>