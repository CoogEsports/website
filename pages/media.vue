<template>
  <div class="min-h-screen bg-lighter-base text-white font-sans">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6">MEDIA WALL</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c]" >

      <!-- media tags. currently by years -->
      <div class="relative">
        <div class="sticky top-0 z-10 flex justify-between gap-2 my-8">
          <div class="flex justify-start gap-2">
            <button
              v-for="year in years"
              :key="year"
              :class="
                selectedYear === year
                  ? 'bg-secondary text-white'
                  : 'bg-[#2c2c2c] text-gray-400'
              "
              class="py-2 px-4 rounded hover:bg-secondary hover:text-white transition-colors duration-300"
              @click="setYear(year)"
            >
              {{ year }}
            </button>
          </div>
          <!-- pagination -->
          <div class="flex justify-end items-center gap-4">
            <div class="items-center flex">
              <button
                :disabled="currentPage === 1"
                :class="{ 'opacity-25 cursor-not-allowed': currentPage === 1 }"
                @click="previousPage"
              >
                <svg
                  class="mx-3 h-auto w-6 text-gray-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                  />
                </svg>
              </button>

              <span
                v-for="page in totalPages"
                :key="page"
                :class="{
                  'underline text-white font-bold ': currentPage === page,
                  'cursor-pointer': currentPage !== page,
                }"
                class="mx-2 text-lg font-thin text-calendar font-arimo"
                @click="goToPage(page)"
              >
                {{ page }}
              </span>

              <button
                :disabled="currentPage === totalPages"
                :class="{
                  'opacity-25 cursor-not-allowed': currentPage === totalPages,
                }"
                @click="nextPage"
              >
                <svg
                  class="h-6 w-6 text-gray-600 mx-3"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- media grid -->
      <div class="grid grid-cols-3 gap-4">
        <div
          v-for="(media, index) in paginatedMedia"
          :key="index"
          class="bg-lighter-base rounded-lg relative pb-[100%]"
        >
          <img
            :src="media.image"
            alt="Media Image"
            class="absolute top-0 left-0 w-full hover:cursor-pointer h-full object-cover"
            @click="expandImage(media.image)"
          >
        </div>
      </div>

      <!-- fullscreen overlay -->
      <div
        v-if="expandedImageUrl"
        class="fixed inset-0 cursor-pointer bg-black bg-opacity-50 flex items-center justify-center z-50 transition-opacity duration-300"
        :class="{
          'opacity-100': expandedImageUrl,
          'opacity-0': !expandedImageUrl,
        }"
        @click="closeExpandedImage"
      >
        <img
          :src="expandedImageUrl"
          alt="expanded image"
          class="max-w-full max-h-full object-contain transition-transform duration-300 transform"
          :class="{
            'scale-100': expandedImageUrl,
            'scale-95': !expandedImageUrl,
          }"
        >
      </div>

      <!-- pagination -->
      <div class="flex justify-end items-center gap-4 mt-8">
        <div class="items-center flex">
          <button
            :disabled="currentPage === 1"
            :class="{ 'opacity-25 cursor-not-allowed': currentPage === 1 }"
            @click="previousPage"
          >
            <svg
              class="mx-3 h-auto w-6 text-gray-600"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
              />
            </svg>
          </button>

          <span
            v-for="page in totalPages"
            :key="page"
            :class="{
              'underline text-white font-bold ': currentPage === page,
              'cursor-pointer': currentPage !== page,
            }"
            class="mx-2 text-lg font-thin text-calendar font-arimo"
            @click="goToPage(page)"
          >
            {{ page }}
          </span>

          <button
            :disabled="currentPage === totalPages"
            :class="{
              'opacity-25 cursor-not-allowed': currentPage === totalPages,
            }"
            @click="nextPage"
          >
            <svg
              class="h-6 w-6 text-gray-600 mx-3"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch, onMounted } from 'vue';
import testImg from '@/assets/img/media_page/1355994.jpg';
import testImg2 from '@/assets/img/media_page/test_img2.jpg';
import testImg3 from '@/assets/img/media_page/test_img3.jpg';

// reactive variable to store the URL of the expanded image
const expandedImageUrl = ref(null);

// function to expand the image
const expandImage = (url) => {
  expandedImageUrl.value = url;
};

// function to close the expanded image
const closeExpandedImage = () => {
  expandedImageUrl.value = null;
};
// Reactive state
const years = ref(['2023 - 2024', '2024 - 2025', '2025 - 2026', '2026 - 2027']);
const selectedYear = ref('2024 - 2025');
const mediaItems = ref([]);
const currentPage = ref(1);
const itemsPerPage = 9;
const totalPages = computed(() =>
  Math.ceil(mediaItems.value.length / itemsPerPage)
);

// computed pagination
const paginatedMedia = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage;
  const end = currentPage.value * itemsPerPage;
  return mediaItems.value.slice(start, end);
});

watch(selectedYear, fetchMediaItems);
watch(currentPage, fetchMediaItems);

// dummy data for fetching. replace with api call
function fetchMediaItems() {
  const allMediaItems = [
    { id: 1, year: '2023 - 2024', image: testImg },
    // 19 images for testing pagination
    { id: 2, year: '2024 - 2025', image: testImg },
    { id: 3, year: '2024 - 2025', image: testImg },
    { id: 4, year: '2024 - 2025', image: testImg },
    { id: 5, year: '2024 - 2025', image: testImg },
    { id: 6, year: '2024 - 2025', image: testImg },
    { id: 7, year: '2024 - 2025', image: testImg },
    { id: 8, year: '2024 - 2025', image: testImg },
    { id: 9, year: '2024 - 2025', image: testImg },
    { id: 10, year: '2024 - 2025', image: testImg },
    { id: 11, year: '2024 - 2025', image: testImg2 },
    { id: 12, year: '2024 - 2025', image: testImg },
    { id: 13, year: '2024 - 2025', image: testImg2 },
    { id: 14, year: '2024 - 2025', image: testImg },
    { id: 15, year: '2024 - 2025', image: testImg2 },
    { id: 16, year: '2024 - 2025', image: testImg2 },
    { id: 17, year: '2024 - 2025', image: testImg2 },
    { id: 18, year: '2024 - 2025', image: testImg },
    { id: 19, year: '2024 - 2025', image: testImg },
    { id: 20, year: '2024 - 2025', image: testImg3 },
    { id: 21, year: '2025 - 2026', image: testImg2 },
    { id: 22, year: '2026 - 2027', image: testImg3 },
  ];

  mediaItems.value = allMediaItems.filter(
    (media) => media.year === selectedYear.value
  );
}

// set default
function setYear(year) {
  selectedYear.value = year;
  currentPage.value = 1;
}

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

function goToPage(page) {
  currentPage.value = page;
}

onMounted(() => {
  fetchMediaItems();
});
</script>
