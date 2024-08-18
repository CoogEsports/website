<template>
  <div class="min-h-screen bg-lighter-base text-white font-sans">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6">EVENTS</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700" />
      <Calendar />
    </div>
  </div>
</template>

<!-- importing component calendar -->
<script setup>
import Calendar from '~/components/DisplayCalendar.vue'
</script>