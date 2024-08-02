<template>
  <div class="max-w-7xl mx-auto py-8 flex justify-between items-center">
    <div class="flex space-x-6">
      <!-- nav icons -->
      <a href="#home" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'x-twitter']" />
      </a>
      <a href="#about" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'instagram']" />
      </a>
      <a href="#" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'twitch']" />
      </a>
      <a href="#contact" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'discord']" />
      </a>
    </div>

    <a href="/">
      <img src="/assets/img/coogesports_w_text.png" class="w-32 h-auto" alt="Coog Esports">
    </a>

    <div class="flex space-x-6">
      <a href="#home" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fas', 'bag-shopping']" />
      </a>
      <a href="#about" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fas', 'gear']" />
      </a>
      <a href="#about" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fas', 'rss']" />
      </a>
      <nuxt-link to="/login" class="text-2xl text-secondary"> <!-- Correct link to login page -->
        <font-awesome-icon :icon="['fas', 'user']" />
      </nuxt-link>
    </div>
  </div>

  <div class="max-w-7xl mx-auto mb-10">
    <div class="flex justify-center space-x-6">
      <a href="#home" class="text-white uppercase px-4 py-2 border border-primary">
        Home
      </a>
      <a href="#about" class="text-white uppercase px-4 py-2">
        Teams
      </a>
      <a href="/events" class="text-white uppercase px-4 py-2">
        Events
      </a>
      <a href="#contact" class="text-white uppercase px-4 py-2">
        Media
      </a>
      <a href="#contact" class="text-white uppercase px-4 py-2">
        Merch
      </a>
      <a href="#contact" class="text-white uppercase px-4 py-2">
        Contact
      </a>
    </div>
  </div>
</template>

<script>
export default {
  // Your component logic here
}
</script>

<style scoped>
/* Your styles here */
</style>
