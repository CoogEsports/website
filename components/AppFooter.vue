<template>
  <footer class="bg-gray-1000 text-white py-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <!-- Left Section: Social Media Links -->
      <div class="flex flex-col items-start space-y-2">
        <div class="text-lg font-semibold">LET'S CONNECT</div>
        <div class="flex space-x-4">
          <a href="#" class="text-2xl text-red-600">
            <font-awesome-icon :icon="['fab', 'x-twitter']" />
          </a>
          <a href="#" class="text-2xl text-red-600">
            <font-awesome-icon :icon="['fab', 'instagram']" />
          </a>
          <a href="#" class="text-2xl text-red-600">
            <font-awesome-icon :icon="['fab', 'discord']" />
          </a>
          <a href="#" class="text-2xl text-red-600">
            <font-awesome-icon :icon="['fab', 'twitch']" />
          </a>
        </div>
      </div>

      <!-- Center Section: Sponsors -->
      <div class="text-center">
        <div class="text-lg font-semibold">SPONSORED BY</div>
        <div class="flex space-x-6 justify-center mt-2">
          <img src="/assets/img/your_logo_here.jpg" alt="Logo0" class="h-20">
          <img src="/assets/img/your_logo_here.jpg" alt="Logo1" class="h-20">
          <img src="/assets/img/your_logo_here.jpg" alt="Logo2" class="h-20">
        </div>
      </div>

      <!-- Right Section: Contact Info -->
      <div class="text-right">
        <div class="font-semibold text-lg">University of Houston Esports Club</div>
        <div>4465 University Dr. MAILBOX 50</div>
        <div>Houston, TX 77204</div>
        <div><a href="mailto:coogesports@gmail.com" class="underline">coogesports@gmail.com</a></div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'AppFooter'
}
</script>

<style scoped>
/* Add any specific styles for your footer here */
</style>
