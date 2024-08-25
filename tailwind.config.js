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
      arimo: ['Arimo'],
    },
    extend: {
      colors: {
        'base': '#151313',
        'primary': '#89141b',
        'secondary': '#f0333d',
        'lighter-base': '#1b1b1b',
        'prev-next-month': '#e3e1e2',
        'calendar': '#cecccd',
        'current-month': '#f8f8f8', 
      },
      backgroundImage: {
        'val-bg': "url('/assets/img/val_bg_gray.png')",
        'ow2-bg': "url('/assets/img/ow2_bg_gray.png')",
        'os-bg': "url('/assets/img/os_bg_gray_2.png')",
        'cs2-bg': "url('/assets/img/cs2_bg_gray.png')",
        'lol-bg': "url('/assets/img/lol_bg_gray.png')",
        'rl-bg': "url('/assets/img/rl_bg_gray.png')",
        'ssbu-bg': "url('/assets/img/ssbu_bg_gray.png')",
      }
    },
  },
  variants: {
    scrollbar: ['rounded'], // if using a custom plugin for rounded scrollbars
  },
  plugins: [
    require('tailwind-scrollbar')// add this if using a scrollbar plugin
  ],
};
