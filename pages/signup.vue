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
          // Handle password mismatch error, e.g., show an error message
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
          // Handle signup error, e.g., show an error message
        }
      }
    }
  }
  </script>
  
  <style scoped>
  .signup-page {
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
  
  .signup-container {
    width: 400px;
    height: 70vh;
    padding: 20px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.75);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: white;
  }
  
  .signup-title {
    text-align: center;
    margin-bottom: 0px;
    font-size: 40px;
  }
  
  .signup-subtitle {
    text-align: center;
    margin-bottom: 10px;
    font-size: 15px; /* Adjust the font size as needed */
    color: white; /* Adjust the color as needed */
  }
  
  .input-group {
    margin-bottom: 5px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    color: white;
  }
  
  input {
    width: 100%;
    height: 5vh;
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
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  .login-link {
    text-align: center;
    margin-top: 5px;
    color: white;
  }
  
  .login-link a {
    color: #e20002;
    text-decoration: none;
  }
  
  .login-link a:hover {
    text-decoration: underline;
  }
  </style>
  