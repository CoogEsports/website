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
        <!-- Create New Match Form -->
        <div class="bg-gray-1000 p-6 rounded-lg shadow-md mb-6">
          <h2 class="text-xl font-semibold mb-4">Create New Match</h2>
          <form @submit.prevent="createMatch" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
              <div class="col-span-1">
                <label for="team1" class="block text-gray-300">Team 1</label>
                <input
                  type="text"
                  id="team1"
                  v-model="newMatch.team1"
                  placeholder="Enter Team 1 Name"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div class="col-span-1">
                <label for="team2" class="block text-gray-300">Team 2</label>
                <input
                  type="text"
                  id="team2"
                  v-model="newMatch.team2"
                  placeholder="Enter Team 2 Name"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div class="col-span-1">
                <label for="date" class="block text-gray-300">Date</label>
                <input
                  type="date"
                  id="date"
                  v-model="newMatch.date"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div class="col-span-1">
                <label for="time" class="block text-gray-300">Time</label>
                <input
                  type="time"
                  id="time"
                  v-model="newMatch.time"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
              <div class="col-span-1">
                <label for="matchType" class="block text-gray-300">Match Type</label>
                <input
                  type="text"
                  id="matchType"
                  v-model="newMatch.matchType"
                  placeholder="Enter Match Type"
                  class="mt-1 block w-full p-2 h-12 border border-gray-1000 bg-gray-1000 rounded text-black"
                />
              </div>
            </div>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mt-4">Create Match</button>
          </form>
        </div>

        <!-- Upcoming Matches Table -->
        <div class="bg-gray-1000 p-6 rounded-lg shadow-md">
          <div class="mb-4">
            <button @click="deleteSelectedMatches" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete Selected</button>
          </div>
          <table class="min-w-full bg-gray-1000">
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
                <th class="py-2 px-4 border-b border-gray-600">Team 1</th>
                <th class="py-2 px-4 border-b border-gray-600">Team 2</th>
                <th class="py-2 px-4 border-b border-gray-600">Date</th>
                <th class="py-2 px-4 border-b border-gray-600">Time</th>
                <th class="py-2 px-4 border-b border-gray-600">Match Type</th>
                <th class="py-2 px-4 border-b border-gray-600">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="match in matches" :key="match.id" class="bg-gray-1000 border-b-2 border-gray-600">
                <td class="py-2 px-4 text-center">
                  <input
                    type="checkbox"
                    v-model="match.selected"
                    class="form-checkbox h-5 w-5 text-gray-1000"
                  />
                </td>
                <td class="py-2 px-4 text-center">{{ match.team1 }}</td>
                <td class="py-2 px-4 text-center">{{ match.team2 }}</td>
                <td class="py-2 px-4 text-center">{{ match.date }}</td>
                <td class="py-2 px-4 text-center">{{ match.time }}</td>
                <td class="py-2 px-4 text-center">{{ match.matchType }}</td>
                <td class="py-2 px-4 text-center">
                  <button @click="editMatch(match.id)" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</button>
                  <button @click="confirmDelete(match.id)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 ml-2">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const matches = ref([])

const newMatch = ref({
  team1: '',
  team2: '',
  date: '',
  time: '',
  matchType: ''
})

const selectAll = ref(false)

function createMatch() {
  const match = { ...newMatch.value, id: Date.now(), selected: false }
  matches.value.push(match)
  newMatch.value = { team1: '', team2: '', date: '', time: '', matchType: '' }
}

function editMatch(id) {
  // Implement edit functionality
}

function confirmDelete(id) {
  if (window.confirm('Are you sure you want to delete this match?')) {
    deleteMatch(id)
  }
}

function deleteMatch(id) {
  matches.value = matches.value.filter(match => match.id !== id)
}

function deleteSelectedMatches() {
  matches.value = matches.value.filter(match => !match.selected)
}

function toggleSelectAll() {
  matches.value.forEach(match => {
    match.selected = selectAll.value
  })
}
</script>



