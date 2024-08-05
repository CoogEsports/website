

<template>
    <div class="min-h-screen bg-lighter-base text-white font-sans">
      <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">MATCHES</h1>
        
        <!-- game filter tabs -->
        <div class="flex gap-2 mb-4">
          <button v-for="filter in filters" :key="filter" @click="setFilter(filter)"
                  :class="{'bg-primary text-white': selectedFilter === filter, 'bg-gray-700': selectedFilter !== filter}"
                  class="py-2 px-4 rounded">
            {{ filter }}
          </button>
        </div>
        
        <!-- matches -->
        <div class="space-y-4">
          <div v-for="(match, index) in filteredMatches" :key="index" class="bg-gray-800 p-4 rounded-lg flex justify-between items-center">
            <div class="flex items-center justify-center">
                <img :src="match.teamA.logo" alt="Team A Logo" class="w-12 h-12 mr-4"/>

              <div>
                <div class="text-xl font-bold">{{ match.teamA.name }} vs {{ match.teamB.name }}</div>
                <div class="text-gray-400">{{ match.tournament }}</div>
                <div class="text-gray-500">{{ match.date }} | {{ match.time }}</div>
              </div>
              <img :src="match.teamB.logo" alt="Team B Logo" class="w-12 h-12 mr-4"/>
            </div>
            <div class="text-right">
                <div v-if="match.status === 'LIVE'" class="text-red-500 font-bold">
                    <a :href="streamingLink" target="_blank" rel="noopener noreferrer">LIVE</a>
                </div>
              <div v-else class="text-gray-400">{{ match.status }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
import { ref, computed } from 'vue'

// either need to pull image from DB or have hardcoded logos for all teams
import coogLogo from '@/assets/img/coog_esports_logo.png'
import bLogo from '@/assets/img/test_team_b_logo.jpg'

//streaming site link FIXME change before deploy
const streamingLink = 'https://www.youtube.com/watch?v=xvFZjo5PgG0'

// user selected tabs. need to add functionality to disply
const filters = ['All', 'LoL', 'VAL', 'CS2', 'OW2', 'SSB', 'RL', 'OS']
const selectedFilter = ref('All')

// matches... to be pulled from DB from api
// status needs to by dynamically updated.
// add greyed out recently completed matches
const matches = ref([
  {
    game: 'LoL',
    teamA: { name: 'UH TEAM A', logo: coogLogo},
    teamB: { name: 'OPPONENT 1', logo: bLogo },
    tournament: 'CVAL SOUTH',
    date: 'June 1st, 2024',
    time: '3:00 PM',
    status: 'LIVE',
  },
  {
    game: 'VAL',
    teamA: { name: 'UH TEAM A', logo: coogLogo },
    teamB: { name: 'OPPONENT 2', logo: bLogo },
    tournament: 'FIGHTER\'S CUP',
    date: 'December 3rd, 2024',
    time: '5:00 PM',
    status: 'UPCOMING',
  },
])

// return all by default. add pagination.
// returns filtered games based on user selected tag
const filteredMatches = computed(() => {
  if (selectedFilter.value === 'All') return matches.value
  return matches.value.filter(match => match.game.includes(selectedFilter.value))
})

const setFilter = (filter) => {
  selectedFilter.value = filter
}
</script>

