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
      // need to cycle thru if multiple per game. TODO. FIXME.
      backgroundImage: {
        'val-bg': "url('/assets/img/game_bg/val_bg_gray_gradient.png')",
        'ow2-bg': "url('/assets/img/game_bg/ow2_bg_gray_gradient.png')",
        'cs2-bg': "url('/assets/img/game_bg/cs2_bg_gray_gradient.png')",
        'lol-bg': "url('/assets/img/game_bg/lol_bg_gray_gradient.png')",
        'rl-bg': "url('/assets/img/game_bg/rl_bg_gray_gradient.png')",
        'ssbu-bg': "url('/assets/img/game_bg/ssbu_bg_gray_gradient.png')",
        'apex-bg': "url('/assets/img/game_bg/apex_bg_gray_gradient.png')",
        'fortnite-bg': "url('/assets/img/game_bg/fortnite_bg_gray_2_gradient.png')",
        'tcg-bg': "url('/assets/img/game_bg/tcg_bg_gray_gradient.png')",
        'pokemon-bg': "url('/assets/img/game_bg/pokemon_bg_gray_3_gradient.png')",
        'fgc-bg': "url('/assets/img/game_bg/fgc_bg_gray_3_gradient.png')",

        // ---------- opacity/50 ---------------
        'tcg-faded-bg': "url('/assets/img/game_bg/tcg_bg_gray_faded_50_gradient.png')",

        
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
