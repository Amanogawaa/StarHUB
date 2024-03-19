/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,ts}", "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      colors: {
        white: {
          gainsboro: "#DCDCDC",
          alice_blue: "#f0f8ff",
          bone_white: "#F9F6EE",
        },
        green: {
          meduim_sea_green: "#3CB371",
          sea_green: "#2E8B57	",
          meduim_spring_green: "#00FA9A",
          spring_green: "#00FF7F",
          forest_green: "#228B22",
          lime_green: "#32CD32",
          lime: "#00FF00",
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
