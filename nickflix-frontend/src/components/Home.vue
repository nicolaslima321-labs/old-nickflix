<template>
  <div class="flex items-center">
    <nav class="">
      <div class="colored">
        <h1 class="nickflix-logo">NICKFLIX</h1>
      </div>
    
      <div class="custom-text">
        <button class="bg-red-700 text-white font-bold py-2 px-4 rounded">
          Sign Up
        </button>
      </div>
    </nav>

    <h1 class="custom-text">Unlimited movies, TV shows, and more.
    Watch anywhere. Cancel anytime.</h1>
  </div>
</template>

<script>
export default {
  name: 'Home'
}
</script>

<style>
  body {
    background-image: url("../../public/primary-background.jpg");
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  .colored{
    color: rgb(229, 9, 20);
  }

  .custom-text {
    font-family: 'Martel Sans';
  }

  .nickflix-logo {
    color: rgb(229, 9, 20);
    font-size: 3em;
  }
</style>