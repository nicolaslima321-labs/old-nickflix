<template>
  <div>
    <iframe width="1120" height="630" :src="srcDiscography" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</template>

<script>
export default {
  name: 'DiscographyPlayer',

  props: {
    srcDiscography: String,
  },

  data () {
    return {
      
    }
  },

  methods: {

  }
}
</script>

<style scoped>
</style>