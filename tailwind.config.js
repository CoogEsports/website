import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                'sans': ['Barlow', 'sans-serif'],
                'chakra': ['Chakra Petch', 'sans-serif'],
            },
            colors: {
                'primary': '#F32C46',
                'secondary': '#202329',
                'layer-800': '#04080F',
                'layer-700': '#11161E',
                'layer-600': '#282D34',
                'layer-500': '#555B63',
                'layer-400': '#82878C',
                'layer-300': '#ABAFB2',
                'layer-200': '#DFE2E5',
                'layer-100': '#FFFFFF',
            }
        },
    },

    plugins: [forms],
};
