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
  width: 100vw;
  height: 80vh;
  background-image: url('/assets/img/loginbg.png'); /* Adjust the path if needed */
  background-size: 35%; /* Adjust this value to scale the image */
  background-repeat: no-repeat;
  background-position: center center;
  background-color: #646464;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden; /* Prevent scrollbars */
}

.login-container {
  width: 500px;
  height: 60vh;
  padding: 20px;
  border-radius: 5px;
  background-color: rgba(0, 0, 0, 0.75);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  color: white;
}

.login-title {
  text-align: center;
  margin-bottom: 20px;
  font-size: 40px;
}


.login-subtitle {
  text-align: center;
  margin-bottom: 10px;
  font-size: 15px; /* Adjust the font size as needed */
  color: white; /* Adjust the color as needed */
}


.input-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: white;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #ffffff;
  color: white;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #e20002;
  border: none;
  border-radius: 5px;
  color: white;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.signup-link {
  text-align: center;
  margin-top: 15px;
  color: white;
}

.signup-link a {
  color: #e20002;
  text-decoration: none;
}

.signup-link a:hover {
  text-decoration: underline;
}
</style>
