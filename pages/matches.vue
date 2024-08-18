<template>
  <div class="min-h-screen bg-lighter-base text-white font-sans">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6">MATCHES</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

      <!-- game filter tabs -->
      <div class="flex gap-2 mb-4">
        <button
v-for="filter in filters" :key="filter" :class="selectedFilter === filter ? 'bg-red-600 text-white' : 'bg-gray-700 text-gray-400'"
          class="py-2 px-4 rounded hover:bg-red-500 transition-colors duration-300"
          @click="setFilter(filter)">
          {{ filter }}
        </button>
      </div>

      <!-- matches -->
      <div class="space-y-4">
        <div class="relative z-10 bg-black bg-opacity-60 p-3 rounded-lg" style="height: h-32; overflow-y: auto;">
          <div
v-for="(match, index) in filteredMatches" :key="index"
            class="relative p-6  my-5 rounded-lg flex justify-between items-center bg-cover"
            :class="getBackgroundClass(match.game)">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-950 from-10% to-black opacity-80"/>

            <!-- A vs. B  -->
            <div class="relative flex items-center space-x-4 z-10">
              <!-- team A -->
              <div class="flex flex-col items-center space-y-2">
                <img :src="match.teamA.logo" alt="Team A Logo" class="w-12 h-12" >
                <span class="font-bold text-center">{{ match.teamA.name }}</span>
              </div>

              <div class="text-xl font-bold">VS</div>

              <!-- team B -->
              <div class="flex flex-col items-center space-y-2">
                <img :src="match.teamB.logo" alt="Team B Logo" class="w-12 h-12" >
                <span class="font-bold text-center">{{ match.teamB.name }}</span>
              </div>
            </div>

            <!-- tourney details -->
            <div class="relative flex flex-col items-center font-bold text-white text-2xl text-center z-10">
              <div>{{ match.tournament }}</div>
              <div class="text-white text-sm font-bold">{{ match.date }} | {{ match.time }}</div>
            </div>

            <!-- status -->
            <div class="relative text-center z-10">
              <div v-if="match.status === 'LIVE'" class="text-secondary font-bold text-xl">
                <a :href="streamingLink" target="_blank" rel="noopener noreferrer" class="hover:underline">
                  LIVE<font-awesome-icon :icon="['fas', 'circle']" />
                </a>
              </div>
              <div v-else class="text-white ">{{ match.status }}</div>
            </div>
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
    teamA: { name: 'UH TEAM A', logo: coogLogo },
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
  {
    game: 'CS2',
    teamA: { name: 'UH TEAM A', logo: coogLogo },
    teamB: { name: 'OPPONENT 3', logo: bLogo },
    tournament: 'GLOBAL OFFENSIVE LEAGUE',
    date: 'July 10th, 2024',
    time: '1:00 PM',
    status: 'FINISHED',
  },
  {
    game: 'OW2',
    teamA: { name: 'UH TEAM B', logo: coogLogo },
    teamB: { name: 'OPPONENT 4', logo: bLogo },
    tournament: 'OVERWATCH CHAMPIONSHIP',
    date: 'August 22nd, 2024',
    time: '7:00 PM',
    status: 'LIVE',
  },
  {
    game: 'SSB',
    teamA: { name: 'UH TEAM C', logo: coogLogo },
    teamB: { name: 'OPPONENT 5', logo: bLogo },
    tournament: 'SMASH BROS BATTLE',
    date: 'September 15th, 2024',
    time: '4:00 PM',
    status: 'UPCOMING',
  },
  {
    game: 'RL',
    teamA: { name: 'UH TEAM D', logo: coogLogo },
    teamB: { name: 'OPPONENT 6', logo: bLogo },
    tournament: 'ROCKET LEAGUE CHALLENGE',
    date: 'October 5th, 2024',
    time: '6:30 PM',
    status: 'FINISHED',
  },
  {
    game: 'OS',
    teamA: { name: 'UH TEAM E', logo: coogLogo },
    teamB: { name: 'OPPONENT 7', logo: bLogo },
    tournament: 'OSU MANIA',
    date: 'November 12th, 2024',
    time: '2:00 PM',
    status: 'LIVE',
  },
  {
    game: 'LoL',
    teamA: { name: 'UH TEAM A', logo: coogLogo },
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
  {
    game: 'CS2',
    teamA: { name: 'UH TEAM A', logo: coogLogo },
    teamB: { name: 'OPPONENT 3', logo: bLogo },
    tournament: 'GLOBAL OFFENSIVE LEAGUE',
    date: 'July 10th, 2024',
    time: '1:00 PM',
    status: 'FINISHED',
  },
  {
    game: 'OW2',
    teamA: { name: 'UH TEAM B', logo: coogLogo },
    teamB: { name: 'OPPONENT 4', logo: bLogo },
    tournament: 'OVERWATCH CHAMPIONSHIP',
    date: 'August 22nd, 2024',
    time: '7:00 PM',
    status: 'LIVE',
  },
  {
    game: 'SSB',
    teamA: { name: 'UH TEAM C', logo: coogLogo },
    teamB: { name: 'OPPONENT 5', logo: bLogo },
    tournament: 'SMASH BROS BATTLE',
    date: 'September 15th, 2024',
    time: '4:00 PM',
    status: 'UPCOMING',
  },
  {
    game: 'RL',
    teamA: { name: 'UH TEAM D', logo: coogLogo },
    teamB: { name: 'OPPONENT 6', logo: bLogo },
    tournament: 'ROCKET LEAGUE CHALLENGE',
    date: 'October 5th, 2024',
    time: '6:30 PM',
    status: 'FINISHED',
  },
  {
    game: 'OS',
    teamA: { name: 'UH TEAM E', logo: coogLogo },
    teamB: { name: 'OPPONENT 7', logo: bLogo },
    tournament: 'OSU MANIA',
    date: 'November 12th, 2024',
    time: '2:00 PM',
    status: 'LIVE',
  },
]);

// return all by default. add pagination.
// returns filtered games based on user selected tag
const filteredMatches = computed(() => {
  if (selectedFilter.value === 'All') return matches.value
  return matches.value.filter(match => match.game.includes(selectedFilter.value))
})

const setFilter = (filter) => {
  selectedFilter.value = filter
}

// get background image based on game type of match
const getBackgroundClass = (game) => {
  switch (game) {
    case 'LoL':
      return 'bg-lol-bg bg-cover bg-center';
    case 'VAL':
      return 'bg-val-bg bg-cover ';
    case 'CS2':
      return 'bg-cs2-bg bg-cover ';
    case 'OW2':
      return 'bg-ow2-bg bg-cover bg-center';
    case 'SSB':
      return 'bg-ssbu-bg bg-cover bg-center';
    case 'RL':
      return 'bg-rl-bg bg-cover bg-center';
    case 'OS':
      return 'bg-os-bg bg-cover bg-left';
    default:
      return 'bg-gray-800'; // default
  }
};

</script>