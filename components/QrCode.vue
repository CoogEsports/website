<!-- QRCode.vue -->
<template>
  <div v-if="show" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg max-w-sm w-full">
      <h2 class="text-xl font-bold mb-4">Event QR Code</h2>
      <div ref="modalQrCode" class="mx-auto mb-4"/> <!-- QR code displayed here -->
      <p class="text-sm text-gray-600 mb-4">Scan this QR code to access the event's sign-in sheet.</p>
      <button class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors" @click="close">
        Close
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';

// Props for the component
const props = defineProps({
  show: {
    type: Boolean,
    required: true
  },
  data: {
    type: String,
    required: true
  }
});

// Emit for notifying the parent component
const emit = defineEmits(['close']);

// Ref for the QR code container
const modalQrCode = ref(null);

// Function to generate the QR code
const generateQrCode = async () => {
  const { default: QRCodeStyling } = await import('qr-code-styling'); // Dynamically import the library

  const qrCodeInstance = new QRCodeStyling({
    width: 200,
    height: 200,
    type: 'svg', // or 'canvas' for PNG
    data: props.data,
    dotsOptions: {
      color: "#000000", // Color of the QR code dots
      type: "square" // Style of the dots (square, rounded, etc.)
    },
    backgroundOptions: {
      color: "#ffffff" // Background color of the QR code
    },
    cornersSquareOptions: {
      color: "#000000", // Color of the corner squares
      type: "extra-rounded" // Style of the corner squares
    },
  });

  // Render the QR code inside the specified modal div
  qrCodeInstance.append(modalQrCode.value);
};

// Watch for show prop changes to generate QR code
watch(() => props.show, (newValue) => {
  if (newValue) {
    generateQrCode(); // Generate QR code when the modal is shown
  }
});

// Function to close the modal and emit the close event
const close = () => {
  emit('close'); // Emit the close event to notify the parent
};
</script>

<style scoped>
/* Add some basic styling if needed */
.cursor-pointer {
  cursor: pointer; /* Change cursor on hover */
}
</style>
