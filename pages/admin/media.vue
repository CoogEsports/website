<template>
  <div class="flex h-screen">
    <!-- Admin Panel Sidebar -->
    <aside class="w-64 bg-gray-1000 text-red-600 p-4">
      <h1 class="text-2xl font-bold mb-10">Coog Esports</h1>
      <ul class="mt-8">
        <li class="mb-4"><NuxtLink to="/admin" class="block py-2 text-red-500">Dashboard</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/settings" class="block py-2 text-red-500">Member List</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/event" class="block py-2 text-red-500">Events</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/matches" class="block py-2 text-red-500">Matches</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/media" class="block py-2 text-red-500">Media</NuxtLink></li>
        <li class="mb-4"><NuxtLink to="/admin/payment" class="block py-2 text-red-500">Payment</NuxtLink></li>
        <li><NuxtLink to="/admin/settings" class="block py-2 text-red-500">Settings</NuxtLink></li>
      </ul>
    </aside>

    <!-- Divider -->
    <div class="w-1 bg-blue-500"></div>

    <!-- Main Content Area -->
    <main class="flex-1 bg-gray-1000 p-4">
      <div class="p-4 bg-gray-1000 text-white min-h-screen">
        <!-- Header with Home Button -->
        <div class="flex justify-between items-center mb-4">
          <h1 class="text-2xl font-bold">Media</h1>
          <NuxtLink to="/admins" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800">Home</NuxtLink>
        </div>

        <!-- Upload Media Form -->
        <div class="bg-gray-800 p-6 rounded shadow-md mb-6">
          <h2 class="text-xl font-semibold mb-4">Upload Media</h2>
          <form @submit.prevent="uploadMedia" class="space-y-4">
            <!-- File Upload -->
            <div>
              <label for="fileUpload" class="block text-gray-300">Upload Image</label>
              <input
                type="file"
                id="fileUpload"
                @change="handleFileUpload"
                class="mt-1 block w-full p-2 border border-gray-600 bg-gray-700 rounded text-white"
              />
            </div>
            <!-- URL Import -->
            <div>
              <label for="urlImport" class="block text-gray-300">Import Image from URL</label>
              <input
                type="text"
                id="urlImport"
                v-model="imageUrl"
                placeholder="Enter image URL"
                class="mt-1 block w-full p-2 border border-gray-600 bg-gray-700 rounded text-white"
              />
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Media</button>
          </form>
        </div>

        <!-- Media Gallery -->
        <div class="bg-gray-800 p-6 rounded shadow-md">
          <h2 class="text-xl font-semibold mb-4">Media Gallery</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            <div v-for="media in mediaItems" :key="media.id" class="relative group flex items-center justify-center bg-gray-700 rounded overflow-hidden">
              <img :src="media.url" alt="Media" class="max-w-full max-h-full object-contain cursor-pointer" @click="openModal(media.url)" />
              <button @click="confirmDeleteMedia(media.id)" class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">Delete</button>
            </div>
          </div>
        </div>

        <!-- Image Modal -->
        <div v-if="modalVisible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
          <div class="bg-white p-4 rounded relative">
            <button @click="closeModal" class="absolute top-2 right-2 text-black text-2xl">&times;</button>
            <img :src="modalImageUrl" alt="Media" class="max-w-full max-h-full" />
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imageUrl: '',
      mediaItems: [],  // Initialize with empty array or fetch from an API
      modalVisible: false,
      modalImageUrl: ''
    }
  },
  methods: {
    uploadMedia() {
      if (this.imageUrl) {
        // Add URL media to the gallery
        this.mediaItems.push({ id: Date.now(), url: this.imageUrl });
        this.imageUrl = ''; // Clear URL input after submission
      }
    },
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          // Add file media to the gallery
          this.mediaItems.push({ id: Date.now(), url: reader.result });
        };
        reader.readAsDataURL(file);
      }
    },
    openModal(url) {
      this.modalImageUrl = url;
      this.modalVisible = true;
    },
    closeModal() {
      this.modalVisible = false;
      this.modalImageUrl = '';
    },
    confirmDeleteMedia(id) {
      if (window.confirm('Are you sure you want to delete this media?')) {
        this.deleteMedia(id);
      }
    },
    deleteMedia(id) {
      // Remove media with the specified ID
      this.mediaItems = this.mediaItems.filter(media => media.id !== id);
    }
  }
}
</script>

<style scoped>
/* Tailwind CSS is used, no additional styles required */
</style>
