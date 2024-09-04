<template>
  <div class="min-h-screen bg-[#f6f0f0] text-secondary font-sans">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6">CLUB EVENTS</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700" >
      <DisplayCalendar />
    </div>
  </div>
</template>

<!-- importing component calendar -->
<script setup>
import DisplayCalendar from '~/components/DisplayCalendar.vue';
</script>