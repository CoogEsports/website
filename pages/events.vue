<template>
    <div>
      <h1 class="text-center text-2xl font-bold my-4">Events</h1>
      <Calendar />
    </div>
  </template>
  
  <script>
  import Calendar from '~/components/Calendar.vue'
  
  export default {
    components: {
      Calendar
    }
  }
  </script>
  
  <style scoped>
  /* Add any specific styles for your events page here */
  </style>
  