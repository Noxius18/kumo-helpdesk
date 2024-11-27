import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  theme: {
      extend: {
          fontFamily: {
              sans: ['Figtree', ...defaultTheme.fontFamily.sans],
              varela: ['Varela Round', ...defaultTheme.fontFamily.sans]
          },
          colors: {
              "kumoBlue": {
                  100: "#0674B3",
                  200: "#009FD9",
                  300: "#12D2F2"
              },
              "kumoWhite": {
                  100: "#FFFCFC",
                  200: "#FDFEFF",
                  300: "#FFFEFE"
              }
          },
      },
  },
  plugins: [],
};