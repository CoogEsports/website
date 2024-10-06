<template>
  <!--  Hero Section -->
  <section class="bg-center bg-cover bg-[url('/assets/img/hero.jpg')] bg-primary bg-blend-multiply">
    <div class="max-w-7xl mx-auto py-48">
      <h1 class="text-4xl font-extrabold tracking-light leading-none text-white uppercase">University of Houston</h1>
      <h1 class="text-8xl font-extrabold tracking-light leading-none text-white uppercase">eSports</h1>
      <div class="max-w-4xl">
        <p class="mb-4 text-lg font-extrabold text-white lg:text-xl py-4">Lorem ipsum dolor sit amet, consectetur
          adipiscing elit. Maecenas in scelerisque ligula. Nullam massa velit, lacinia eu facilisis eget, tempor blandit
          lacus.</p>
        <button type="button"
          class="px-6 py-3.5 text-base font-medium text-center text-white bg-transparent border-2">Learn
          More</button>
      </div>
    </div>
  </section>

  <!-- Announcements Section with Twitter Embed -->
  <section class="bg-gray-1000 py-24">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-5xl font-extrabold text-white uppercase mb-8">Announcements</h2>

      <!-- Flex container for calendar and Twitter -->
      <div class="flex space-x-8">
        <!-- Weekly Calendar Section -->
        <div class="flex-1 mb-8">
          <div class="flex justify-between items-center text-white mb-4">
            <div class="flex space-x-2">
              <button class="px-4 py-2 bg-blue-600 rounded">Previous</button>
              <button class="px-4 py-2 bg-blue-600 rounded">Next</button>
            </div>
          </div>
          <div class="grid grid-cols-7 gap-4">
            <!-- Days of the week -->
            <div class="text-center text-lg font-bold text-gray-400">Sun</div>
            <div class="text-center text-lg font-bold text-gray-400">Mon</div>
            <div class="text-center text-lg font-bold text-gray-400">Tue</div>
            <div class="text-center text-lg font-bold text-gray-400">Wed</div>
            <div class="text-center text-lg font-bold text-gray-400">Thu</div>
            <div class="text-center text-lg font-bold text-gray-400">Fri</div>
            <div class="text-center text-lg font-bold text-gray-400">Sat</div>
            <!-- Announcements for each day -->
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Tournament</h4>
              <p>Join us for the tournament this Sunday!</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Team Meeting</h4>
              <p>Weekly team meeting on Monday.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Game Night</h4>
              <p>Game night on Tuesday, don't miss it!</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Strategy Session</h4>
              <p>Strategy session on Wednesday.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Practice</h4>
              <p>Practice matches on Thursday.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Game Streaming</h4>
              <p>Watch us stream our games on Friday!</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
              <h4 class="font-bold">Recap</h4>
              <p>Weekly recap on Saturday.</p>
            </div>
          </div>
        </div>

        <!-- Twitter Embedded Timeline -->
        <div class="flex-none w-1/3">
          <div class="p-6 bg-white shadow-lg rounded-lg" style="height: 800px; overflow-y: auto;">
            <div id="twitter-container">
              <a class="twitter-timeline" href="https://twitter.com/coogesports?ref_src=twsrc%5Etfw">Tweets by coogesports</a>
            </div>
          </div>
        </div>
      </div>

      <div class="space-y-6">
        <!-- Example Announcement -->
        <div class="p-6 bg-white shadow-lg rounded-lg">
          <h3 class="text-2xl font-bold text-gray-700">Upcoming Tournament</h3>
          <p class="text-lg text-gray-600">Join us for the next campus-wide tournament on November 15th.</p>
        </div>
        <div class="p-6 bg-white shadow-lg rounded-lg">
          <h3 class="text-2xl font-bold text-gray-700">New Team Members</h3>
          <p class="text-lg text-gray-600">We are thrilled to welcome three new members to the team!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Teams Section -->
  <section class="bg-gray-1000 py-24">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-5xl font-extrabold text-white uppercase mb-8 text-center">Our Teams</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- League of Legends Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/lol-logo.png" alt="League of Legends Logo" class="h-28 w-auto">
        </div>

        <!-- Overwatch Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/ow-logo.png" alt="Overwatch Logo" class="h-24 w-auto">
        </div>

        <!-- Rocket League Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/rl-logo.png" alt="Rocket League Logo" class="h-28 w-auto">
        </div>

        <!-- Counter-Strike 2 Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/cs2-logo.png" alt="Counter-Strike 2 Logo" class="h-28 w-auto">
        </div>

        <!-- Valorant Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/valorant-logo.png" alt="Valorant Logo" class="h-28 w-auto">
        </div>

        <!-- Smash Bros Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/smash-logo.png" alt="Smash Bros Logo" class="h-28 w-auto">
        </div>

        <!-- Apex Legends Team -->
        <div class="bg-[#202020] rounded-lg text-center w-52 h-52 mx-auto flex items-center justify-center">
          <img src="/assets/img/apex-logo.png" alt="Apex Legends Logo" class="h-28 w-auto">
        </div>
      </div>
    </div>
  </section>

  <!-- Meet Our Coordinators Section -->
  <section class="bg-gray-1000 py-24">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-5xl font-extrabold text-white uppercase mb-8">Meet Our Coordinators</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Coordinator 1 -->
        <div class="bg-[#1c1c1c] rounded-lg text-center p-6">
          <!-- <img src="/assets/img/coordinator1.jpg" alt="Coordinator 1" class="h-28 w-auto mx-auto rounded-full mb-4"> -->
          <h3 class="text-xl font-bold text-white">John Doe</h3>
          <p class="text-gray-400">Event Coordinator</p>
        </div>

        <!-- Coordinator 2 -->
        <div class="bg-[#1c1c1c] rounded-lg text-center p-6">
          <!-- <img src="/assets/img/coordinator2.jpg" alt="Coordinator 2" class="h-28 w-auto mx-auto rounded-full mb-4"> -->
          <h3 class="text-xl font-bold text-white">Jane Smith</h3>
          <p class="text-gray-400">Community Manager</p>
        </div>

        <!-- Coordinator 3 -->
        <div class="bg-[#1c1c1c] rounded-lg text-center p-6">
          <!-- <img src="/assets/img/coordinator3.jpg" alt="Coordinator 3" class="h-28 w-auto mx-auto rounded-full mb-4"> -->
          <h3 class="text-xl font-bold text-white">Alex Brown</h3>
          <p class="text-gray-400">Strategy Lead</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Meet Our Officers Section -->
  <section class="bg-gray-1000 py-24">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-5xl font-extrabold text-white uppercase mb-8">Meet Our Officers</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Officer 1 -->
        <div class="bg-[#202020] rounded-lg text-center p-6">
          <img src="/assets/img/officer1.jpg" alt="Officer 1" class="h-28 w-auto mx-auto rounded-full mb-4">
          <h3 class="text-xl font-bold text-white">Harris "Axe" Ali</h3>
          <p class="text-gray-400">President</p>
        </div>

        <!-- Officer 2 -->
        <div class="bg-[#202020] rounded-lg text-center p-6">
          <img src="/assets/img/officer2.jpg" alt="Officer 2" class="h-28 w-auto mx-auto rounded-full mb-4">
          <h3 class="text-xl font-bold text-white">Katherine "katwnotail" Delgado</h3>
          <p class="text-gray-400">Vice President</p>
        </div>

        <!-- Officer 3 -->
        <div class="bg-[#202020] rounded-lg text-center p-6">
          <img src="/assets/img/officer3.jpg" alt="Officer 3" class="h-28 w-auto mx-auto rounded-full mb-4">
          <h3 class="text-xl font-bold text-white">Hunter "Apollo" Johnson</h3>
          <p class="text-gray-400">Treasurer</p>
        </div>

        <!-- Officer 4 -->
        <div class="bg-[#202020] rounded-lg text-center p-6">
          <img src="/assets/img/officer4.jpg" alt="Officer 4" class="h-28 w-auto mx-auto rounded-full mb-4">
          <h3 class="text-xl font-bold text-white">Bianca "binko" Panes</h3>
          <p class="text-gray-400">Secretary</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    // Load Twitter widget script
    const script = document.createElement('script');
    script.src = 'https://platform.twitter.com/widgets.js';
    script.async = true;
    script.chars = 'utf-8';
    document.body.appendChild(script);
  },
};
</script>