/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./app/views/**/*.php","./public/**/*.php"],
    theme: {
      extend: {
        fontFamily: {
          customFont: ['"Poppins"', 'sans-serif'], // Add Poppins as a custom font
        },
      },
    },
    plugins: [],
  }


