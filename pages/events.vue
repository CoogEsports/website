<template>
    <div>
      <h1 class="text-center text-2xl text-white font-bold my-4 ">Events</h1>
      <Calendar />
    </div>
  </template>
  
  <!-- importing component calendar -->
  <script>
  import Calendar from '~/components/Calendar.vue'
  
  export default {
    components: {
      Calendar
    }
  }
  </script>
  
  <style scoped>
  /* add specific styling for events page here */
  </style>
  