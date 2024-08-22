<template>
  <div class="max-w-7xl mx-auto navigation py-2 flex justify-between items-center sticky">
    <div class="flex space-x-6">
      <!-- nav icons -->
      <a href="https://x.com/coogesports" target="_blank" rel="noopener noreferrer" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'x-twitter']" />
      </a>
      <a href="https://www.instagram.com/coogesports/" target="_blank" rel="noopener noreferrer" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'instagram']" />
      </a>
      <a href="https://www.twitch.tv/coogesports" target="_blank" rel="noopener noreferrer" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fab', 'twitch']" />
      </a>
      <a href="https://discord.com/invite/coog-gaming-154441500950921216" target="_blank" rel="noopener noreferrer" class="text-2xl text-secondary">
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
      <a href="#about" class="text-2xl text-secondary">
        <font-awesome-icon :icon="['fas', 'user']" />
      </a>
    </div>


  </div>

  <!-- changed to NuxtLink to use exact-active-class to move border to appropriate page -->
  <div class="max-w-7xl mx-auto m-4 ">
    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-white " >
    <div class="flex justify-center space-x-6">
      <NuxtLink to="/" exact-active-class="border border-primary" class="text-white uppercase px-4 py-2">
        Home
      </NuxtLink>
      <NuxtLink to="/teams" exact-active-class="border border-primary" class="text-white uppercase px-4 py-2">
        Teams
      </NuxtLink>
      <NuxtLink to="/events" exact-active-class="border border-primary" class="text-white uppercase px-4 py-2">
        Events
      </NuxtLink>
      <NuxtLink to="/media" exact-active-class="border border-primary" class="text-white uppercase px-4 py-2">
        Media
      </NuxtLink>
      <NuxtLink to="/matches" exact-active-class="border border-primary" class="text-white uppercase px-4 py-2">
        MATCHES
      </NuxtLink>
      <NuxtLink to="/contact" exact-active-class="border border-primary" class="text-white uppercase px-4 py-2">
        Contact
      </NuxtLink>
    </div>
  </div>


</template>

<style scoped>
.nuxt-link-exact-active {
  border: 1px solid var(--primary-color); /* Adjust this to your actual primary color variable or value */
}
</style>