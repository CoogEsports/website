<template>
  <div class="login-page">
    <div class="login-container">
      <form @submit.prevent="login">
        <h2 class="login-title">Sign In</h2>
        <p class="login-subtitle">
          Log in with credentials used during sign up<br />
          Do not use your CougarNet ID.
        </p>
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" v-model="email" id="email" required />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" v-model="password" id="password" required />
        </div>
        <button type="submit">Sign In</button>
        <div class="signup-link">
          New? <a href="/signup">Sign Up!</a>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'login-layout',
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    async login() {
      try {
        await this.$axios.post('/api/login', {
          email: this.email,
          password: this.password
        });
        // Redirect or show a success message after login
      } catch (error) {
        console.error(error);
        // Handle login error, e.g., show an error message
      }
    }
  }
}
</script>

<style scoped>
.login-page {
  @apply w-screen h-[80vh] bg-gray-600 flex justify-center items-center overflow-hidden;
  background-image: url('/assets/img/loginbg.png');
  background-size: 35%;
  background-repeat: no-repeat;
  background-position: center center;
}

.login-container {
  @apply w-[500px] h-[60vh] p-5 rounded-lg bg-black bg-opacity-75 shadow-lg text-white;
}

.login-title {
  @apply text-center mb-5 text-[40px];
}

.login-subtitle {
  @apply text-center mb-2 text-sm text-white;
}

.input-group {
  @apply mb-4;
}

label {
  @apply block mb-1 text-white;
}

input {
  @apply w-full p-2 border border-gray-300 rounded-lg bg-white text-gray-900;
}

button {
  @apply w-full p-2 bg-red-600 rounded-lg text-white text-base cursor-pointer hover:bg-red-700;
}

.signup-link {
  @apply text-center mt-4 text-white;
}

.signup-link a {
  @apply text-red-600 no-underline hover:underline;
}
</style>
