/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,ts}", "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      colors: {
        white: {
          gainsboro: "#DCDCDC",
          alice_blue: "#f0f8ff",
        },
        black: {
          midnight_blue: "#101720",
          charcoal_gray: "#171717",
          rich_black: "#020d19",
          dark_slate: "#0d1717",
        },
      },
      fontFamily: {
        primary: "Sora",
        secondary: "Poppins",
      },
      backgroundColor: {
        white: {
          gainsboro: "#DCDCDC",
          alice_blue: "#f0f8ff",
        },
        black: {
          midnight_blue: "#101720",
          charcoal_gray: "#171717",
          rich_black: "#020d19",
          dark_slate: "#0d1717",
        },
      },
    },
  },
  plugins: [require("flowbite/plugin")],
};
