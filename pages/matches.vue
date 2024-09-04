<template>
  <div class="min-h-screen bg-lighter-base text-white font-sans">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6">MATCHES</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c]" >

      <!-- game filter tabs -->
      <div class="flex gap-2 mb-4">
        <button
          v-for="filter in filters"
          :key="filter"
          :class="
            selectedFilter === filter
              ? 'bg-secondary text-white'
              : 'bg-[#2c2c2c] text-gray-400'
          "
          class="py-2 px-4 rounded hover:bg-secondary hover:text-white transition-colors duration-300"
          @click="setFilter(filter)"
        >
          {{ filter }}
        </button>
      </div>

      <!-- matches -->
      <div
        class="static rounded-lg scrollbar scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thumb-[#2c2c2c] h-32 scrollbar-track-base overflow-y-auto"
        style="height: 1000px"
      >
        <div
          class="relative z-10 bg-base bg-opacity-100 py-6 pl-6 pr-2 rounded-lg"
        >
          <div
            v-for="(match, index) in filteredMatches"
            :key="index"
            class="relative p-10 mb-4 rounded-lg flex justify-between items-center bg-cover"
            :class="getBackgroundClass(match.game)"
          >
            <div
              class="absolute text-gray-400 inset-0 bg-gradient-to-r from-black from-10% to-black opacity-50"
            />

            <!-- A vs. B  -->
            <div class="relative flex items-center text-xl text-white z-10">
              <!-- team A -->
              <div class="flex flex-col items-center">
                <img
                  :src="match.teamA.logo"
                  alt="Team A Logo"
                  class="w-32 h-32 text-2xl"
                >
                <span class="font-bold text-center mt-8">{{
                  match.teamA.name
                }}</span>
              </div>

              <div class="text-4xl flex px-1 font-bold text-white">VS</div>

              <!-- team B -->
              <div class="flex flex-col items-center object-contain">
                <img
                  :src="match.teamB.logo"
                  alt="Team B Logo"
                  class="w-32 h-32 text-2xl"
                >
                <span class="font-bold text-center mt-8">{{
                  match.teamB.name
                }}</span>
              </div>
            </div>

            <!-- match details -->
            <div
              class="relative flex flex-col items-center font-bold text-white text-4xl z-10"
            >
              <div>{{ match.details }}</div>
              <div class="text-white text-2xl py-2 font-thin">
                <!-- idk .toString() kept showing GMT so i had to do this abomination -->
                {{ match.datetime.format('MMMM D, YYYY [|] h:mm A') }}
                {{ getTimeZoneAbbreviation(match.datetime) }}
              </div>
            </div>

            <!-- status -->
            <div class="relative text-center text-2xl z-10">
              <div
                v-if="match.status === 'LIVE'"
                class="text-secondary font-bold"
              >
                <a
                  :href="streamingLink"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="hover:underline"
                >
                  LIVE<font-awesome-icon :icon="['fas', 'circle']" />
                </a>
              </div>
              <div v-else class="text-white font-thin">{{ match.status }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

// either need to pull image from DB or have hardcoded logos for all teams
import coogLogo from '@/assets/img/team_logos/coog_resized_for_gc.png';
import bLogo from '@/assets/img/team_logos/test_team_b_logo.jpg';

import dayjs from 'dayjs';
import utc from 'dayjs/plugin/utc';
import timezone from 'dayjs/plugin/timezone';
import isBetween from 'dayjs/plugin/isBetween';

// import timezone from 'dayjs/plugin/timezone' // ES 2015
// extend dayjs with utc and timezone plugins
dayjs.extend(utc);
dayjs.extend(timezone);
dayjs.extend(isBetween);

//const userTimezone = dayjs.tz.guess();

dayjs.tz.setDefault('America/Chicago');
//streaming site link FIXME change before deploy
const streamingLink = 'https://www.youtube.com/watch?v=xvFZjo5PgG0';

// user selected tabs. need to add functionality to disply
const filters = [
  'All',
  'LoL',
  'VAL',
  'CS2',
  'OW2',
  'SSBU',
  'RL',
  'APEX',
  'FORTNITE',
  'FGC',
  'POKEMON',
  'TCG',
];
const selectedFilter = ref('All');

// matches... to be pulled from DB from api
// status needs to by dynamically updated.
// add greyed out recently completed matches
const matches = ref([
  {
    game: 'LoL',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 1', logo: bLogo },
    details: 'CVAL SOUTH',
    datetime: dayjs('2024-08-25T05:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'VAL',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 2', logo: bLogo },
    details: "FIGHTER'S CUP",
    datetime: dayjs('2024-08-25T07:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'CS2',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 3', logo: bLogo },
    details: 'GLOBAL OFFENSIVE LEAGUE',
    datetime: dayjs('2024-08-25T09:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'OW2',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 4', logo: bLogo },
    details: 'OVERWATCH CHAMPIONSHIP',
    datetime: dayjs('2024-08-25T11:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'SSBU',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 5', logo: bLogo },
    details: 'SMASH BROS BATTLE',
    datetime: dayjs('2024-08-25T13:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'RL',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 6', logo: bLogo },
    details: 'ROCKET LEAGUE CHALLENGE',
    datetime: dayjs('2024-08-25T15:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'APEX',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 7', logo: bLogo },
    details: 'APEX OF THE APEX',
    datetime: dayjs('2024-08-25T17:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'FGC',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 8', logo: bLogo },
    details: 'EVO UH',
    datetime: dayjs('2024-08-25T17:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'FORTNITE',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 9', logo: bLogo },
    details: 'NIGHT OF THE FORT',
    datetime: dayjs('2024-08-25T17:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'POKEMON',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 10', logo: bLogo },
    details: 'Catching All of Them',
    datetime: dayjs('2024-08-25T17:00:00'),
    status: 'UPCOMING',
  },
  {
    game: 'TCG',
    teamA: { name: 'University of Houston', logo: coogLogo },
    teamB: { name: 'University of Opponents 11', logo: bLogo },
    details: 'Gather the Magicks',
    datetime: dayjs('2024-08-25T17:00:00'),
    status: 'UPCOMING',
  },
]);

// i began to implement the logic for displaying match time in user's timezone but
// i finished it and i realized it's still better to just throw [CST/CDT] in escape characters and trashed the idea.

// need to dynamically calc daylight savings to know to display CDT or CST year to year
// calculate the second Sunday in March
const getDstStartDate = (year) => {
  let date = dayjs(`March 1, ${year}`);
  while (date.day() !== 0) {
    // find the first Sunday
    date = date.add(1, 'day');
  }
  return date.add(7, 'days'); // add 7 days to get the second Sunday
};

// calculate the first Sunday in November
const getDstEndDate = (year) => {
  let date = dayjs(`November 1, ${year}`);
  while (date.day() !== 0) {
    // find the first Sunday
    date = date.add(1, 'day');
  }
  return date; // first Sunday in November
};

// if DST -> CDT. if not -> CST
// Centeral Daylight Time vs Central Standard Time
const isDaylightSavingTime = (date) => {
  const year = date.year();
  const dstStart = getDstStartDate(year);
  const dstEnd = getDstEndDate(year);

  return date.isBetween(dstStart, dstEnd, 'day', '[)');
};

const getTimeZoneAbbreviation = (datetime) => {
  const isDST = isDaylightSavingTime(datetime);
  return isDST ? 'CDT' : 'CST';
};

// function to check and update the status of past matches
// for now all mock data is defaulted to 'UPCOMING'
// only ran once on app load.
const updateInitialMatchStatus = () => {
  const now = dayjs(); // DB will be chicago timezone,

  matches.value.forEach((match) => {
    const matchTime = match.datetime;
    if (now.isAfter(matchTime, 'day')) {
      match.status = 'FINISHED';
    }
  });
};
// dynamically update
const updateMatchStatus = () => {
  const now = dayjs(); // get current date and time

  matches.value.forEach((match) => {
    const matchTime = match.datetime;
    const diffInHours = now.diff(matchTime, 'hour'); // calculate difference in hours

    if (diffInHours >= 0 && diffInHours <= 3) {
      match.status = 'LIVE';
    } else if (diffInHours > 3) {
      match.status = 'FINISHED';
    } else {
      match.status = 'UPCOMING';
    } // setting default to 'UPCOMING', redundant but not sure what is good practice
  });
};

// on mount swap all past matches to FINISHED, run dynamic status function, check every minute
onMounted(() => {
  updateInitialMatchStatus();
  updateMatchStatus();
  setInterval(updateMatchStatus, 60000);
});

// return all by default. add pagination.
// returns filtered games based on user selected tag
const filteredMatches = computed(() => {
  if (selectedFilter.value === 'All') return matches.value;
  return matches.value.filter((match) =>
    match.game.includes(selectedFilter.value)
  );
});

const setFilter = (filter) => {
  selectedFilter.value = filter;
};

// get background image based on game type of match
const getBackgroundClass = (game) => {
  switch (game) {
    case 'LoL':
      return 'bg-lol-bg bg-cover bg-center ';
    case 'VAL':
      return 'bg-val-bg bg-cover ';
    case 'CS2':
      return 'bg-cs2-bg bg-cover ';
    case 'OW2':
      return 'bg-ow2-bg bg-cover bg-center';
    case 'SSBU':
      return 'bg-ssbu-bg bg-cover bg-center';
    case 'RL':
      return 'bg-rl-bg bg-cover bg-center';
    case 'APEX':
      return 'bg-apex-bg bg-cover bg-center';
    case 'FORTNITE':
      return 'bg-fortnite-bg bg-cover bg-center';
    case 'FGC':
      return 'bg-fgc-bg bg-cover bg-center';
    case 'POKEMON':
      return 'bg-pokemon-bg bg-cover bg-center';
    case 'TCG':
      return 'bg-tcg-bg bg-cover bg-center';
    default:
      return 'bg-gray-800'; // default
  }
};
</script>
