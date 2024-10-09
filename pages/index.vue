<!-- 
    this code was not using tailwindcss, not eslint, not .prettier formatting either,
    i have taken it upon myself to redo this page. -brespina  
-->
<template>
  <div>
    <!-- again, pull from mock data, not hardcode -brespina -->
    <!--  Hro Section -->
    <section
      class="bg-center bg-cover bg-[url('/assets/img/hero.jpg')] bg-primary bg-blend-multiply"
    >
      <div class="max-w-7xl mx-auto py-48">
        <h1
          class="text-4xl font-extrabold tracking-light leading-none text-white uppercase"
        >
          University of Houston
        </h1>
        <h1
          class="text-8xl font-extrabold tracking-light leading-none text-white uppercase"
        >
          eSports
        </h1>
        <div class="max-w-4xl">
          <p class="mb-4 text-lg font-extrabold text-white lg:text-xl py-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
            scelerisque ligula. Nullam massa velit, lacinia eu facilisis eget,
            tempor blandit lacus.
          </p>
          <!-- button does nothing -brespina -->
          <button
            type="button"
            class="px-6 py-3.5 text-base font-medium text-center text-white bg-transparent border-2"
          >
            Learn More
          </button>
        </div>
      </div>
    </section>

    <!-- Announcements Section with Twitter Embed -->
    <section class="bg-gray-1000 mt-12">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-5xl font-extrabold text-white uppercase mb-8">
          Announcements
        </h2>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c] mb-10" >

        <!-- Flex container for calendar and Twitter -->
        <div class="flex space-x-8">
          <!-- Weekly Calendar Section -->
          <div class="flex-1 mb-8">
            <div class="flex justify-between items-center text-white mb-4">
              <div class="flex space-x-2">
                <!-- these buttons do nothing -brespina -->
                <button
                  class="px-4 py-2 bg-[#2c2c2c] text-gray-400 rounded font-sans"
                >
                  Previous
                </button>
                <button
                  class="px-4 py-2 bg-[#2c2c2c] text-gray-400 rounded font-sans"
                >
                  Next
                </button>
              </div>
            </div>
            <div class="grid grid-cols-7 gap-4">
              <!-- everything should be pulled from mock data not hard coded. -brespina -->
              <!-- take advantage of grids use v-for to generate so my eyes are not accosted -brespina -->
              <!-- Days of the week -->
              <div
                v-for="(day, index) in daysOfWeek"
                :key="index"
                class="text-center text-lg font-bold text-gray-400"
              >
                {{ day }}
              </div>
              <!-- text is not controlled for overflow -brespina -->
              <!-- sweet baby jebus use v-for pls -brespina -->
              <!-- Announcements for each day -->
              <div
                class="bg-current-month p-4 rounded-lg shadow-lg overflow-hidden text-ellipsis"
              >
                <h4 class="font-bold overflow-hidden text-ellipsis">
                  Tournament
                </h4>
                <p class="overflow-hidden text-ellipsis">
                  Join us for the tournament this Sunday!
                </p>
              </div>
              <div class="bg-current-month p-4 rounded-lg shadow-lg">
                <h4 class="font-bold overflow-hidden text-ellipsis">
                  Team Meeting
                </h4>
                <p class="overflow-hidden text-ellipsis">
                  Weekly team meeting on Monday.
                </p>
              </div>
              <div
                class="bg-current-month p-4 rounded-lg shadow-lg overflow-hidden text-ellipsis"
              >
                <h4 class="font-bold overflow-hidden text-ellipsis">
                  Game Night
                </h4>
                <p class="overflow-hidden text-ellipsis">
                  Game night on Tuesday, don&apos;t miss it!
                </p>
              </div>
              <div
                class="bg-current-month p-4 rounded-lg shadow-lg overflow-hidden text-ellipsis"
              >
                <h4 class="font-bold overflow-hidden text-ellipsis">
                  Strategy Session
                </h4>
                <p class="overflow-hidden text-ellipsis">
                  Strategy session on Wednesday.
                </p>
              </div>
              <div
                class="bg-current-month p-4 rounded-lg shadow-lg overflow-hidden text-ellipsis"
              >
                <h4 class="font-bold overflow-hidden text-ellipsis">
                  Practice
                </h4>
                <p class="overflow-hidden text-ellipsis">
                  Practice matches on Thursday.
                </p>
              </div>
              <div
                class="bg-current-month p-4 rounded-lg shadow-lg overflow-hidden text-ellipsis"
              >
                <h4 class="font-bold overflow-hidden text-ellipsis">
                  Game Streaming
                </h4>
                <p class="overflow-hidden text-ellipsis">
                  Watch us stream our games on Friday!
                </p>
              </div>
              <div
                class="bg-current-month p-4 rounded-lg shadow-lg overflow-hidden text-ellipsis"
              >
                <h4 class="font-bold overflow-hidden text-ellipsis">Recap</h4>
                <p class="overflow-hidden text-ellipsis">
                  Weekly recap on Saturday.
                </p>
              </div>
            </div>
            <div class="py-9 text-center">
              <div
                class="mt-48 py-5 bg-current-month shadow-lg rounded-lg justify-end"
              >
                <h3 class="text-2xl font-bold text-gray-700">
                  Upcoming Tournament
                </h3>
                <p class="text-lg text-gray-600">
                  Join us for the next campus-wide tournament on November 15th.
                </p>
              </div>
              <div class="mt-12 py-5 bg-white shadow-lg rounded-lg">
                <h3 class="text-2xl font-bold text-gray-700">
                  New Team Members
                </h3>
                <p class="text-lg text-gray-600">
                  We are thrilled to welcome three new members to the team!
                </p>
              </div>
            </div>
          </div>
          <!-- cool -brespina -->
          <!-- Twitter Embedded Timeline -->
          <div class="flex-none w-1/3">
            <div
              class="p-6 bg-white shadow-lg rounded-lg"
              style="height: 800px; overflow-y: auto"
            >
              <div id="twitter-container">
                <a
                  class="twitter-timeline"
                  href="https://twitter.com/coogesports?ref_src=twsrc%5Etfw"
                  target="_blank"
                  rel="noopener noreferrer"
                  >Tweets by coogesports</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- should be pulling from data not hard coded -brespina -->
    <!-- teams -->
    <section class="bg-lighter-base py-8">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-5xl font-extrabold text-white uppercase mb-8 text-left">
          Teams
        </h2>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c] mb-10" >
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <div
            v-for="(team, index) in teams"
            :key="index"
            class="bg-[#2c2c2c] px-1 rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center"
          >
            <img :src="team.logo" :alt="team.alt" class="h-28 w-auto" >
          </div>
        </div>
      </div>
    </section>
    <!-- coords -->
    <section class="bg-base my-8 pb-8">
      <div class="max-w-7xl mx-auto text-left">
        <h2 class="text-5xl font-extrabold text-white uppercase mb-8">
          Coordinators
        </h2>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c] mb-10" >
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-8">
          <div
            v-for="(coordinator, index) in coordinators"
            :key="index"
            class="bg-lighter-base rounded-lg text-center p-6"
          >
            <h3 class="text-xl font-bold text-white">{{ coordinator.name }}</h3>
            <p class="text-gray-400">{{ coordinator.position }}</p>
          </div>
        </div>
      </div>
    </section>
    <!-- officers -->
    <section class="bg-lighter-base text-gray-400 py-12">
      <div class="max-w-7xl mx-auto text-left">
        <h2 class="text-5xl font-extrabold text-white uppercase mb-8">
          Officers
        </h2>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c] mb-10" >
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
          <div
            v-for="(officer, index) in officers"
            :key="index"
            class="bg-[#2c2c2c] rounded-lg text-center p-6"
          >
            <img
              :src="officer.imgSrc"
              :alt="`Officer ${index + 1}`"
              class="h-28 w-auto mx-auto rounded-full mb-4"
            >
            <h3 class="text-xl font-bold text-white">{{ officer.name }}</h3>
            <p class="text-gray-400">{{ officer.position }}</p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import prezImg from '@/assets/img/officer1.jpg';
import vpImg from '@/assets/img/officer2.jpg';
import treasurerImg from '@/assets/img/officer3.jpg';
import secretaryImg from '@/assets/img/officer4.jpg';
import lolLogo from '/assets/img/lol-logo.png';
import owLogo from '/assets/img/ow-logo.png';
import rlLogo from '/assets/img/rl-logo-better.png';
import cs2Logo from '/assets/img/cs2-logo-better.png';
import valorantLogo from '/assets/img/valorant-logo.png';
import ssbuLogo from '/assets/img/ssbu-logo-2.png';
import apexLogo from '/assets/img/apex-logo.png';

const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

const officers = ref([
  {
    name: 'Harris "Axe" Ali',
    position: 'President',
    imgSrc: prezImg,
  },
  {
    name: 'Katherine "katwnotail" Delgado',
    position: 'Vice President',
    imgSrc: vpImg,
  },
  {
    name: 'Hunter "Apollo" Johnson',
    position: 'Treasurer',
    imgSrc: treasurerImg,
  },
  {
    name: 'Bianca "binko" Panes',
    position: 'Secretary',
    imgSrc: secretaryImg,
  },
]);

const coordinators = ref([
  {
    name: 'John Doe',
    position: 'Event Coordinator',
  },
  {
    name: 'Jane Smith',
    position: 'Community Manager',
  },
  {
    name: 'Alex Brown',
    position: 'Strategy Lead',
  },
]);

const teams = ref([
  {
    logo: lolLogo,
    alt: 'League of Legends Logo',
  },
  {
    logo: owLogo,
    alt: 'Overwatch Logo',
  },
  {
    logo: rlLogo,
    alt: 'Rocket League Logo',
  },
  {
    logo: cs2Logo,
    alt: 'Counter-Strike 2 Logo',
  },
  {
    logo: valorantLogo,
    alt: 'Valorant Logo',
  },
  {
    logo: ssbuLogo,
    alt: 'Smash Bros Logo',
  },
  {
    logo: apexLogo,
    alt: 'Apex Legends Logo',
  },
]);

onMounted(() => {
  // Load Twitter widget script
  const script = document.createElement('script');
  script.src = 'https://platform.twitter.com/widgets.js';
  script.async = true;
  document.body.appendChild(script);
});
</script>

<style scoped>
/* 
*/
</style>
