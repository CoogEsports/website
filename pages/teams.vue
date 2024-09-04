<template>
  <div class="min-h-screen bg-lighter-base text-white font-sans">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6 text-left">TEAMS</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 mb-10">
      <div v-for="(game, index) in games" :key="index" class="mb-16">
        <h2 class="text-2xl mb-10 text-white">{{ game.name }}</h2>
        <!-- using flexbox instead of grid -->
        <div
          class="flex justify-center gap-4 flex-wrap"
        >
          <div
            v-for="(player, playerIndex) in game.players"
            :key="playerIndex"
            class="flex flex-col items-center justify-between px-10"
          >
            <div
              class="bg-white rounded-full w-32 h-32 flex items-center justify-center mb-2"
            >
              <svg
                class="w-20 h-26 text-[#a0a0a0] overflow-hidden"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <font-awesome-icon :icon="['fas', 'user']" />
              </svg>
            </div>
            <span class="text-sm">{{ player.name }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// reactive state for games array with mock data for players
const games = ref([
  { name: 'VALORANT', players: Array(5).fill({ name: 'Player' }), abbrev: 'val' },
  { name: 'LEAGUE OF LEGENDS', players: Array(5).fill({ name: 'Player' }), abbrev: 'lol' },
  { name: 'COUNTER STRIKE 2', players: Array(5).fill({ name: 'Player' }), abbrev: 'cs2' },
  { name: 'SUPER SMASH BROS ULTIMATE', players: Array(5).fill({ name: 'Player' }), abbrev: 'ssbu' },
  { name: 'OVERWATCH 2', players: Array(5).fill({ name: 'Player' }), abbrev: 'ow2' },
  { name: 'ROCKET LEAGUE', players: Array(3).fill({ name: 'Player' }), abbrev: 'rl' },
  { name: 'FORTNITE', players: Array(5).fill({ name: 'Player' }), abbrev: 'fortnite' },
  { name: 'FGC', players: Array(5).fill({ name: 'Player' }), abbrev: 'fgc' },
  { name: 'POKEMON', players: Array(5).fill({ name: 'Player' }), abbrev: 'pokemon' },
  { name: 'TCG', players: Array(5).fill({ name: 'Player' }), abbrev: 'tcg' },
  { name: 'APEX LEGENDS', players: Array(3).fill({ name: 'Player' }), abbrev: 'apex' },
]);

//too lazy to change the rows
games.value.sort((a, b) => a.name.localeCompare(b.name));
</script>
