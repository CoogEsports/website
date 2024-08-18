<template>
  <div class="min-h-screen bg-lighter-base text-white font-sans">

    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6 text-left">TEAMS</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
      <div v-for="(game, index) in games" :key="index" class="mb-8">
        <h2 class="text-2xl font-bold mb-4 text-secondary">{{ game.name }}</h2>
        <div class="grid grid-cols-5 gap-4">
          <div v-for="(player, playerIndex) in game.players" :key="playerIndex" class="flex flex-col items-center">
            <div class="bg-gray-800 rounded-full w-16 h-16 flex items-center justify-center mb-2">
              <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
              </svg>
            </div>
            <span class="text-sm">{{ player.name }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // replace with api call for player naame aand photo
      games: [
        { name: 'VALORANT', players: Array(5).fill({ name: 'Player' }) },
        { name: 'LEAGUE OF LEGENDS', players: Array(5).fill({ name: 'Player' }) },
        { name: 'COUNTER-STRIKE 2', players: Array(5).fill({ name: 'Player' }) },
        { name: 'SUPER SMASH BROS', players: Array(5).fill({ name: 'Player' }) },
        { name: 'OVERWATCH 2', players: Array(5).fill({ name: 'Player' }) },
        { name: 'ROCKET LEAGUE', players: Array(5).fill({ name: 'Player' }) },
        { name: 'OMEGA STRIKERS', players: Array(5).fill({ name: 'Player' }) },
      ]
    };
  },
};
</script>