import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      './node_modules/flowbite/**/*.js',
  ],
  theme: {
      extend: {
          fontFamily: {
              sans: ['Figtree', ...defaultTheme.fontFamily.sans],
              varela: ['Varela Round', ...defaultTheme.fontFamily.sans]
          },
          colors: {
              "kumoBlue": {
                  100: "#0A497E", // Lebih gelap dari 100, tetapi tetap seimbang
                  200: "#0077B6", // Warna biru cerah namun netral
                  300: "#00A3CC"
              },
              "kumoWhite": {
                  100: "#E3E3E3", // Warna abu cerah untuk netralitas
                  200: "#F1F1F1", // Hampir putih, tetap seimbang
                  300: "#FAFAFA"
              }
          },
      },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
};