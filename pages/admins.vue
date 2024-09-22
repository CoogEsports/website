<template>
  <div class="flex h-screen items-center justify-center bg-gray-1000">
    <!-- Main Menu -->
    <div class="bg-gray-1000 p-8 rounded-lg shadow-lg w-100 text-center">
      <!-- Welcome Message -->
      <h1 class="text-5xl text-red-600 font-bold mb-10">Welcome, Admin Name</h1>
      
      <!-- Menu Options -->
      <ul class="text-2xl space-y-4">
        <li><NuxtLink to="/admin/dash" class="block py-2 text-red-600 hover:underline">Dashboard</NuxtLink></li>
        <li><NuxtLink to="/admin/settings" class="block py-2 text-red-600 hover:underline">Member List</NuxtLink></li>
        <li><NuxtLink to="/admin/event" class="block py-2 text-red-600 hover:underline">Events</NuxtLink></li>
        <li><NuxtLink to="/admin/matches" class="block py-2 text-red-600 hover:underline">Matches</NuxtLink></li>
        <li><NuxtLink to="/admin/media" class="block py-2 text-red-600 hover:underline">Media</NuxtLink></li>
        <li><NuxtLink to="/admin/dash" class="block py-2 text-red-600 hover:underline">Payment</NuxtLink></li>
        <li><NuxtLink to="/admin/settings" class="block py-2 text-red-600 hover:underline">Settings</NuxtLink></li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      adminName: 'Admin Name' // Replace with dynamic admin name if needed
    }
  }
}
</script>

<style scoped>
/* Add custom styles if necessary */
</style>
