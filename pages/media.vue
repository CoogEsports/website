<template>
    <div class="min-h-screen bg-lighter-base text-white font-sans">
      <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">MEDIA WALL</h1>
        
        <!-- media tags. currently by years -->
        <div class="flex gap-2 mb-4">
          <button v-for="year in years" :key="year" @click="setYear(year)"
                  :class="{'bg-primary text-white': selectedYear === year, 'bg-gray-700': selectedYear !== year}"
                  class="py-2 px-4 rounded">
            {{ year }}
          </button>
        </div>
        
        <!-- media grid -->
        <div class="grid grid-cols-3 gap-4">
          <div v-for="(media, index) in paginatedMedia" :key="index" class="bg-gray-700 rounded-lg overflow-hidden">
            <img :src="media.image" alt="Media Image" class="w-full h-auto"/>
          </div>
        </div>

      <!-- pagination -->
      <div class="flex justify-center mt-4">
        <button @click="previousPage" :disabled="currentPage === 1" class="py-2 px-4 mx-2 bg-gray-700 rounded">Previous</button>
        <span class="py-2 px-4">{{ currentPage }}</span>
        <button @click="nextPage" :disabled="currentPage === totalPages" class="py-2 px-4 mx-2 bg-gray-700 rounded">Next</button>
      </div>
    </div>
  </div>
  </template>
  
  <script>
  // replace with actual media from db. add upload feature for social media admin view
  import testImg from '@/assets/img/test_img.jpg';


  export default {
    data() {
    return {
      //initializing.
      years: ['2023 - 2024', '2024 - 2025', '2025 - 2026', '2026 - 2027'],
      selectedYear: '2024 - 2025',
      mediaItems: [],
      currentPage: 1,
      itemsPerPage: 9,
      totalPages: 1,
    };
  },
  computed: {
    paginatedMedia() {
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const end = this.currentPage * this.itemsPerPage;
      return this.mediaItems.slice(start, end);
    },
  },
  watch: {
    selectedYear() {
      this.fetchMediaItems();
    },
    currentPage() {
      this.fetchMediaItems();
    },
  },
  methods: {
    fetchMediaItems() {
      // to be replaced with api request 
      const allMediaItems = [
        { year: '2023 - 2024', image: testImg },

        // 19 img. testing pagination. 19/9 rounded up pages -> 3 pages
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg },
 
        { year: '2025 - 2026', image: testImg },
        { year: '2026 - 2027', image: testImg },
      ];

      // gather media from selected filter and determine pagination length
      // need to grey out prev and next buttons for filters with only 1 paage
      this.mediaItems = allMediaItems.filter(media => media.year === this.selectedYear);
      this.totalPages = Math.ceil(this.mediaItems.length / this.itemsPerPage);
    },
    //set default year to current and beginning fo pagination
    setYear(year) {
      this.selectedYear = year;
      this.currentPage = 1;
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
  },
  mounted() {
    this.fetchMediaItems();
  },
};
</script>
  