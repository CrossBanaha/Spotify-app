/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      gridTemplateRows: {
        'custom-layout': 'auto 2fr auto',
      },
      colors:{
        customBase: 'rgb(18, 18, 18)',
      }
    },
  },
  plugins: [],
}