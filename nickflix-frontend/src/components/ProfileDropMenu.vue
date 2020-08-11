<template>
  <div>
    <div class="mt-2 py-2 mr-8 w-32 custom-bg-transparent rounded-md shadow-xl">
      <div v-for="option in options" v-bind:key="option.id">
        <a :href="option.href" class="block px-4 py-2 text-white text-xs hover:underline">{{ option.name }}</a>
        <hr class="opacity-25" v-show="option.separator">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProfileDropMenu",

  props: {
    options: Array,
  }
}
</script>

<style>
  .custom-bg-transparent {
    background-color: rgba(0,0,0, .5);
  }
</style>