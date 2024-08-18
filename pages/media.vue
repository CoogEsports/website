<template>
    <div class="min-h-screen bg-lighter-base text-white font-sans">
      <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">MEDIA WALL</h1>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        
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
  
  <script setup>
  import { ref, computed, watch, onMounted } from 'vue';
  import testImg from '@/assets/img/test_img.jpg';
  import testImg2 from '@/assets/img/test_img2.jpg';
  import testImg3 from '@/assets/img/test_img3.jpg';
  
  // Reactive state
  const years = ref(['2023 - 2024', '2024 - 2025', '2025 - 2026', '2026 - 2027']);
  const selectedYear = ref('2024 - 2025');
  const mediaItems = ref([]);
  const currentPage = ref(1);
  const itemsPerPage = 9;
  const totalPages = computed(() => Math.ceil(mediaItems.value.length / itemsPerPage));
  
  // Computed property for paginated media
  const paginatedMedia = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = currentPage.value * itemsPerPage;
    return mediaItems.value.slice(start, end);
  });
  
  // Watchers
  watch(selectedYear, fetchMediaItems);
  watch(currentPage, fetchMediaItems);
  
  // Fetch media items (replace with actual API request)
  function fetchMediaItems() {
    const allMediaItems = [
        { year: '2023 - 2024', image: testImg },

        // 19 img. testing pagination. 19/9 rounded up pages -> 3 pages
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg }, { year: '2024 - 2025', image: testImg },
        { year: '2024 - 2025', image: testImg2 }, { year: '2024 - 2025', image: testImg2 }, { year: '2024 - 2025', image: testImg2 },
        { year: '2024 - 2025', image: testImg2 }, { year: '2024 - 2025', image: testImg2 }, { year: '2024 - 2025', image: testImg2 },
        { year: '2024 - 2025', image: testImg2 }, { year: '2024 - 2025', image: testImg2 }, { year: '2024 - 2025', image: testImg2 },
        { year: '2024 - 2025', image: testImg3 },
 
        { year: '2025 - 2026', image: testImg2 },
        { year: '2026 - 2027', image: testImg3 },
      ];
  
    // Gather media from selected filter and determine pagination length
    mediaItems.value = allMediaItems.filter(media => media.year === selectedYear.value);
  }
  
  // Set default year and reset pagination
  function setYear(year) {
    selectedYear.value = year;
    currentPage.value = 1;
  }
  
  // Pagination methods
  function nextPage() {
    if (currentPage.value < totalPages.value) {
      currentPage.value++;
    }
  }
  
  function previousPage() {
    if (currentPage.value > 1) {
      currentPage.value--;
    }
  }
  
  // Lifecycle hook
  onMounted(() => {
    fetchMediaItems();
  });
  </script>
  