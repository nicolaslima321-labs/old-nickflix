<template>
  <div class="">
    <nav class="flex flex-column justify-between">
      <h1 class="ml-4 nickflix-logo">NICKFLIX</h1>
      <button class="mt-6 mr-4 custom-text w-36 h-8 text-inline bg-red-700 text-white font-bold py-2 px-4 rounded">
        Sign Up
      </button>
    </nav>
    <div class="mt-12 flex-row justify-center items-center">
      <h1 class="ml-64 justify-center text-white biggest-text custom-text max-w-3xl"><b>Unlimited discographies, music videos,and more.</b></h1>
      <h1 class="ml-64 justify-center text-white middle-text custom-text"><b>Watch anywhere. Cancel anytime.</b></h1>
      <input class="ml-64 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-3/6 h-12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Jane Doe"><button class="mt-6 mr-4 custom-text w-36 h-12 text-inline bg-red-700 text-white font-bold py-2 px-4 rounded">
        Get Started >
      </button>
      <h1 class="ml-64 justify-center text-white middle-text custom-text"><b>Ready to watch? Enter your email to create or restart your membership.</b></h1>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home'
}
</script>

<style>
  body {
    background-image: url("../../public/primary-background.png");
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

  .biggest-text {
    font-size: 4em;
  }

  .middle-text {
    font-size: 1em;
  }

  .nickflix-logo {
    color: rgb(229, 9, 20);
    font-size: 3em;
  }
</style>