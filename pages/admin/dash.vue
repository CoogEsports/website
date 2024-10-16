<template>
  <div class="flex h-screen">
    <!-- Admin Panel Sidebar -->
    <aside class="w-64 bg-base text-secondary p-4">
      <h1 class="text-2xl font-bold mb-10">Coog Esports</h1>
      <ul class="mt-8">
        <li class="mb-4"><NuxtLink to="/admin" class="block py-2 text-secondary">Dashboard</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/settings" class="block py-2 text-secondary">Member List</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/event" class="block py-2 text-secondary">Events</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/matches" class="block py-2 text-secondary">Matches</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/media" class="block py-2 text-secondary">Media</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/payment" class="block py-2 text-secondary">Payment</NuxtLink></li>
        <li><NuxtLink to="/admin/settings" class="block py-2 text-secondary">Settings</NuxtLink></li>
      </ul>
    </aside>

    <!-- Divider -->
    <div class="w-1 bg-primary"></div>

    <!-- Main Content Area -->
    <main class="flex-1 bg-base p-4">
      <div class="p-4 bg-lighter-base text-white min-h-screen">
        <!-- Admin Dashboard -->
        <div class="bg-lighter-base text-white p-4 rounded shadow mb-6 border-2 border-secondary">
          <h1 class="text-2xl font-bold">Admin Dashboard</h1>
          <p class="text-lg mt-2">Welcome, {{ adminName }} ({{ adminRole }})</p>
          <div class="mt-4">
            <button @click="logout" class="bg-secondary px-4 py-2 rounded mr-2">Logout</button>
            <button @click="goHome" class="bg-primary px-4 py-2 rounded">Home</button>
          </div>
        </div>

        <!-- Quick Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="bg-secondary p-4 rounded shadow">
            <h2 class="text-xl font-bold">{{ totalEvents }}</h2>
            <p>Total Events</p>
          </div>
          <div class="bg-secondary p-4 rounded shadow">
            <h2 class="text-xl font-bold">{{ totalMediaItems }}</h2>
            <p>Total Media Items</p>
          </div>
          <div class="bg-secondary p-4 rounded shadow">
            <h2 class="text-xl font-bold">{{ totalMatches }}</h2>
            <p>Total Matches</p>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      adminName: 'Harris',  // Replace with dynamic value if using authentication
      adminRole: 'President',  // Replace with dynamic value if using authentication
      totalEvents: 10,  // Replace with actual data
      totalMediaItems: 5,  // Replace with actual data
      totalMatches: 7,  // Replace with actual data
    }
  },
  methods: {
    logout() {
      // Implement logout logic here
      this.$router.push('/login');  // Redirect to login page
    },
    goHome() {
      // Redirect to the main page
      this.$router.push('/admins');  // Redirect to main page
    }
  }
}
</script>

<style scoped>
/* Tailwind CSS is used, no additional styles required */
</style>
