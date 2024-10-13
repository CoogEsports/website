<!-- this code was not using tailwindcss, not eslint, not .prettier formatting either,
i have taken it upon myself to redo this page. -brespina -->

<template>
  <div
    class="w-screen h-[80vh] bg-contain bg-center bg-[url('@/assets/img/loginbg.png')] bg-repeat-space bg-lighter-base flex justify-center items-center overflow-hidden"
  >
    <div
      class="w-[500px] h-[70vh] p-5 rounded-lg bg-black bg-opacity-95 shadow-lg text-white"
    >
      <form @submit.prevent="signup">
        <h2 class="text-center mb-0 text-[40px] font-sans">Sign Up</h2>
        <p class="text-center mb-2 text-sm text-white font-sans">
          Create an account using your email and set a password<br >
        </p>
        <div class="mb-1">
          <label for="email" class="block mb-1 text-white">Email</label>
          <input
            id="email"
            v-model="email"
            type="email"
            required
            class="w-full h-[5vh] p-2 border border-gray-300 rounded-lg bg-white text-gray-900"
          >
        </div>
        <div class="mb-1">
          <label for="cougarnet-id" class="block mb-1 text-white"
            >CougarNet ID</label
          >
          <input
            id="cougarnet-id"
            v-model="cougarnetId"
            type="text"
            required
            class="w-full h-[5vh] p-2 border border-gray-300 rounded-lg bg-white text-gray-900"
          >
        </div>
        <div class="mb-1">
          <label for="password" class="block mb-1 text-white">Password</label>
          <input
            id="password"
            v-model="password"
            type="password"
            required
            class="w-full h-[5vh] p-2 border border-gray-300 rounded-lg bg-white text-gray-900"
          >
        </div>
        <div class="mb-1">
          <label for="confirm-password" class="block mb-1 text-white"
            >Confirm Password</label
          >
          <input
            id="confirm-password"
            v-model="confirmPassword"
            type="password"
            required
            class="w-full h-[5vh] p-2 border border-gray-300 rounded-lg bg-white text-gray-900"
          >
        </div>
        <button
          type="submit"
          class="w-full p-2 mt-2 bg-red-600 rounded-lg text-white text-base cursor-pointer hover:bg-red-700"
        >
          Sign Up
        </button>
        <div class="text-center mt-2 text-white">
          Already have an account?
          <a href="/login" class="text-red-600 no-underline hover:underline"
            >Sign In!</a
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useAxios } from '@vueuse/integrations/useAxios'; // Assuming you use Axios

const email = ref('');
const cougarnetId = ref('');
const password = ref('');
const confirmPassword = ref('');

const signup = async () => {
  if (password.value !== confirmPassword.value) {
    console.error('Passwords do not match');
    return;
  }

  try {
    const { data, error } = await useAxios('/api/signup', {
      method: 'POST',
      data: {
        email: email.value,
        cougarnetId: cougarnetId.value,
        password: password.value,
      },
    });

    if (error) {
      console.error('Signup failed', error);
    } else {
      console.log('Signup successful', data);
      // Handle successful signup, such as a redirect
    }
  } catch (error) {
    console.error('An error occurred', error);
  }
};
</script>

<style scoped>
/* add if needed */
</style>

<!-- <template>
  <div class="signup-page">
    <div class="signup-container">
      <form @submit.prevent="signup">
        <h2 class="signup-title">Sign Up</h2>
        <p class="signup-subtitle">
          Create an account using your email and set a password<br >
        </p>
        <div class="input-group">
          <label for="email">Email</label>
          <input id="email" v-model="email" type="email" required >
        </div>
        <div class="input-group">
          <label for="cougarnet-id">CougarNet ID</label>
          <input id="cougarnet-id" v-model="cougarnetId" type="text" required >
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input id="password" v-model="password" type="password" required >
        </div>
        <div class="input-group">
          <label for="confirm-password">Confirm Password</label>
          <input id="confirm-password" v-model="confirmPassword" type="password" required >
        </div>
        <button type="submit">Sign Up</button>
        <div class="login-link">
          Already have an account? <a href="/login">Sign In!</a>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'signup-layout',
  data() {
    return {
      email: '',
      cougarnetId: '',
      password: '',
      confirmPassword: ''
    };
  },
  methods: {
    async signup() {
      if (this.password !== this.confirmPassword) {
        // Handle password mismatch error
        console.error('Passwords do not match');
        return;
      }
      try {
        await this.$axios.post('/api/signup', {
          email: this.email,
          cougarnetId: this.cougarnetId,
          password: this.password
        });
        // Redirect or show a success message after signup
      } catch (error) {
        console.error(error);
        // Handle signup error
      }
    }
  }
}
</script>

<style scoped>
.signup-page {
@apply w-screen h-[80vh] bg-gray-600 flex justify-center items-center overflow-hidden;
background-image: url('/assets/img/loginbg.png');
background-size: 35%;
background-repeat: no-repeat;
background-position: center center;
}

.signup-container {
@apply w-[400px] h-[70vh] p-5 rounded-lg bg-black bg-opacity-75 shadow-lg text-white;
}

.signup-title {
@apply text-center mb-0 text-[40px] font-sans;
}

.signup-subtitle {
@apply text-center mb-2 text-sm text-white font-sans;
}

.input-group {
@apply mb-1;
}

label {
@apply block mb-1 text-white;
}

input {
@apply w-full h-[5vh] p-2 border border-gray-300 rounded-lg bg-white text-gray-900;
}

button {
@apply w-full p-2 mt-2 bg-red-600 rounded-lg text-white text-base cursor-pointer hover:bg-red-700;
}

.login-link {
@apply text-center mt-2 text-white;
}

.login-link a {
@apply text-red-600 no-underline hover:underline;
}
</style> -->
