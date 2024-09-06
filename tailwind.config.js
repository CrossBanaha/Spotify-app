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
        customSubBase: 'rgb(35, 35, 35)',
        customBox: 'rgb(38, 38, 38)',
        customText: 'rgb(120, 120, 120)',
        customHover: 'rgb(230, 230, 230)',
      }
    },
  },
  plugins: [],
}