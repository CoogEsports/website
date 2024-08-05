/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './components/**/*.{js,vue,ts}',
    './layouts/**/*.vue',
    './pages/**/*.vue',
    './plugins/**/*.{js,ts}',
    './app.vue',
    './error.vue',
  ],
  theme: {
    fontFamily: {
      sans: ['Lexend'],
    },
    extend: {
      colors: {
        'base': '#151313',
        'primary': '#89141b',
        'secondary': '#f0333d',
        'lighter-base': '#1b1b1b',     
      },
    },
  },
  plugins: [],
};
