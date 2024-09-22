<template>
  <div class="flex h-screen">
    <!-- Admin Panel Sidebar -->
    <aside class="w-64 bg-gray-1000 text-red-600 p-4">
      <h1 class="text-2xl font-bold mb-10">Coog Esports</h1>
      <ul class="mt-8">
        <li class="mb-4"><NuxtLink to="/admin" class="block py-2 text-red-500">Dashboard</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/settings" class="block py-2 text-red-500">Member List</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/event" class="block py-2 text-red-500">Events</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/matches" class="block py-2 text-red-500">Matches</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/media" class="block py-2 text-red-500">Media</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/payment" class="block py-2 text-red-500">Payment</NuxtLink></li>
        <li><NuxtLink to="/admin/settings" class="block py-2 text-red-500">Settings</NuxtLink></li>
      </ul>
    </aside>

    <!-- Divider -->
    <div class="w-1 bg-blue-500"></div>

    <!-- Main Content Area -->
    <main class="flex-1 bg-gray-1000 p-4">
      <div class="p-4 bg-gray-1000 text-white min-h-screen">
        <!-- Create New Event Form -->
        <div class="bg-gray-1000 p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-xl font-arimo mb-4">Create New Event</h2>
          <form @submit.prevent="addEvent" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
              <div>
                <label for="eventId" class="block text-gray-300">Event ID</label>
                <input
                  type="text"
                  id="eventId"
                  v-model="newEvent.id"
                  placeholder="Enter Event ID"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div>
                <label for="eventName" class="block text-gray-300">Event Title</label>
                <input
                  type="text"
                  id="eventName"
                  v-model="newEvent.name"
                  placeholder="Enter Event Title"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div>
                <label for="eventDate" class="block text-gray-300">Date of Event</label>
                <input
                  type="date"
                  id="eventDate"
                  v-model="newEvent.date"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div>
                <label for="eventLocation" class="block text-gray-300">Event Location</label>
                <input
                  type="text"
                  id="eventLocation"
                  v-model="newEvent.location"
                  placeholder="Enter Event Location"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
            </div>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">Add Event</button>
          </form>
        </div>
    
        <!-- Upcoming Events Table -->
        <div class="bg-gray-1000 p-6 rounded-lg shadow-md">
          <div class="mb-4">
            <button @click="confirmDeleteSelected" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete Selected</button>
          </div>
          <table class="min-w-full bg-gray-1000 ">
            <thead>
              <tr class="bg-gray-1000 text-gray-1000">
                <th class="py-2 px-4 border-b border-gray-600">
                  <input
                    type="checkbox"
                    v-model="selectAll"
                    @change="toggleSelectAll"
                    class="form-checkbox h-5 w-5 text-gray-1000"
                  />
                </th>
                <th class="py-2 px-4 border-b border-gray-600">Event ID</th>
                <th class="py-2 px-4 border-b border-gray-600">Event Name</th>
                <th class="py-2 px-4 border-b border-gray-600">Date</th>
                <th class="py-2 px-4 border-b border-gray-600">Location</th>
                <th class="py-2 px-4 border-b border-gray-600">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="event in events" :key="event.id" class="bg-gray-1000 border-b-2 border-gray-600">
                <td class="py-2 px-4 text-center">
                  <input
                    type="checkbox"
                    v-model="event.selected"
                    class="form-checkbox h-5 w-5 text-gray-800"
                  />
                </td>
                <td class="py-2 px-4 text-center">{{ event.id }}</td>
                <td class="py-2 px-4 text-center">{{ event.name }}</td>
                <td class="py-2 px-4 text-center">{{ event.date }}</td>
                <td class="py-2 px-4 text-center">{{ event.location }}</td>
                <td class="py-2 px-4 text-center">
                  <button @click="confirmDeleteEvent(event.id)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newEvent: {
        id: '',
        name: '',
        date: '',
        location: ''
      },
      events: [],  // Initialize with empty array or fetch from an API
      selectAll: false
    }
  },
  methods: {
    addEvent() {
      if (this.newEvent.name && this.newEvent.date && this.newEvent.location) {
        // Add new event to the list
        this.events.push({ ...this.newEvent, selected: false });
        // Clear form fields after submission
        this.newEvent = { id: '', name: '', date: '', location: '' };
      }
    },
    confirmDeleteEvent(id) {
      if (window.confirm('Are you sure you want to delete this event?')) {
        this.deleteEvent(id);
      }
    },
    deleteEvent(id) {
      // Remove event with the specified ID
      this.events = this.events.filter(event => event.id !== id);
    },
    confirmDeleteSelected() {
      if (window.confirm('Are you sure you want to delete the selected events?')) {
        this.deleteSelected();
      }
    },
    deleteSelected() {
      // Remove selected events
      this.events = this.events.filter(event => !event.selected);
      // Reset select all checkbox
      this.selectAll = false;
    },
    toggleSelectAll() {
      // Select or deselect all checkboxes
      this.events.forEach(event => event.selected = this.selectAll);
    }
  }
}
</script>

<style scoped>
/* Tailwind CSS is used, no additional styles required */
</style>
