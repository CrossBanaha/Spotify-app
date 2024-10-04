/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        customBase: 'rgb(18, 18, 18)',
        customText: 'rgb(120, 120, 120)',
        customHover: 'rgb(230, 230, 230)'
      }
    },
  },
  plugins: [],
}