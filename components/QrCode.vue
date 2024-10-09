<!-- QrCode.vue -->
<template>
  <div
    v-if="show"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
  >
    <div class="bg-white p-6 rounded-lg max-w-sm w-full">
      <h2 class="text-xl font-bold mb-4">Event QR Code</h2>
      <div ref="modalQrCode" class="mx-auto mb-4" />
      <!-- QR code displayed here -->
      <p class="text-sm text-gray-600 mb-4">
        Scan this QR code to access the event's sign-in sheet.
      </p>
      <button
        class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors"
        @click="close"
      >
        Close
      </button>
    </div>
  </div>
</template>


<script setup>
// removed defineEmits, as it is a compiler macro and does not need to be imported
import { ref, watch } from 'vue';

const props = defineProps({
  show: {
    type: Boolean,
    required: true,
  },
  data: {
    type: String,
    required: true,
  },
});

const emit = defineEmits(['close']);

const modalQrCode = ref(null);

const generateQrCode = async () => {
  const { default: QRCodeStyling } = await import('qr-code-styling'); // apparently dynamic call, guessing just the way it is
  const qrCodeInstance = new QRCodeStyling({
    width: 200,
    height: 200,
    type: 'svg', // for png do 'canvas'
    data: props.data,
    dotsOptions: {
      color: '#000000',
      type: 'square',
    },
    backgroundOptions: {
      color: '#ffffff',
    },
    cornersSquareOptions: {
      color: '#000000',
      type: 'extra-rounded',
    },
  });

  // render the QR code inside the specified div
  qrCodeInstance.append(modalQrCode.value);
};

// watch for show prop changes to generate QR code
watch(
  () => props.show,
  (newValue) => {
    if (newValue) {
      generateQrCode();
    }
  }
);

// notify parent page, to close event
const close = () => {
  emit('close');
};
</script>

<style scoped>
/* add when tailwind doesn't suffice */
</style>
