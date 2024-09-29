<template>
  <div class="signup-page">
    <div class="signup-container">
      <form @submit.prevent="signup">
        <h2 class="signup-title">Sign Up</h2>
        <p class="signup-subtitle">
          Create an account using your email and set a password<br />
        </p>
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" v-model="email" id="email" required />
        </div>
        <div class="input-group">
          <label for="cougarnet-id">CougarNet ID</label>
          <input type="text" v-model="cougarnetId" id="cougarnet-id" required />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" v-model="password" id="password" required />
        </div>
        <div class="input-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" v-model="confirmPassword" id="confirm-password" required />
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
@apply text-center mb-0 text-[40px];
}

.signup-subtitle {
@apply text-center mb-2 text-sm text-white;
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
</style>
