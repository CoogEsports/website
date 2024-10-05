<template>
  <!-- header container using grid layout with tailwind -->
    <!-- top navigation with social icons, logo, and additional nav icons -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- social media icons on the left -->
      <div class="flex space-x-6 items-center">
        <a
          href="https://x.com/coogesports"
          target="_blank"
          rel="noopener noreferrer"
          class="text-2xl text-secondary"
        >
          <font-awesome-icon :icon="['fab', 'x-twitter']" />
        </a>
        <a
          href="https://www.instagram.com/coogesports/"
          target="_blank"
          rel="noopener noreferrer"
          class="text-2xl text-secondary"
        >
          <font-awesome-icon :icon="['fab', 'instagram']" />
        </a>
        <a
          href="https://www.twitch.tv/coogesports"
          target="_blank"
          rel="noopener noreferrer"
          class="text-2xl text-secondary"
        >
          <font-awesome-icon :icon="['fab', 'twitch']" />
        </a>
        <a
          href="https://discord.com/invite/coog-gaming-154441500950921216"
          target="_blank"
          rel="noopener noreferrer"
          class="text-2xl text-secondary"
        >
          <font-awesome-icon :icon="['fab', 'discord']" />
        </a>
      </div>

      <!-- logo centered in the middle -->
      <a href="/" class="flex justify-center">
        <img
          src="/assets/img/coogesports_w_text.png"
          class="w-32 h-auto"
          alt="Coog Esports"
        >
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

    <!-- main navigation links centered below -->
    <div class="mt-4 max-w-7xl mx-auto">
      <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-white" >
      <div class="flex justify-center mb-4 space-x-6">
        <NuxtLink
          to="/"
          exact-active-class="border border-primary"
          class="text-white uppercase px-4 py-2"
        >
          Home
        </NuxtLink>
        <NuxtLink
          to="/teams"
          exact-active-class="border border-primary"
          class="text-white uppercase px-4 py-2"
        >
          Teams
        </NuxtLink>
        <NuxtLink
          to="/events"
          exact-active-class="border border-primary"
          class="text-white uppercase px-4 py-2"
        >
          Events
        </NuxtLink>
        <NuxtLink
          to="/matches"
          exact-active-class="border border-primary"
          class="text-white uppercase px-4 py-2"
        >
          Matches
        </NuxtLink>
        <NuxtLink
          to="/media"
          exact-active-class="border border-primary"
          class="text-white uppercase px-4 py-2"
        >
          Media
        </NuxtLink>
        <NuxtLink
          to="/contact"
          exact-active-class="border border-primary"
          class="text-white uppercase px-4 py-2"
        >
          Contact
        </NuxtLink>
      </div>
    </div>
</template>

<style scoped>
.nuxt-link-exact-active {
  border: 1px solid var(--primary-color); /* adjust this to your actual primary color variable or value */
}
</style>
