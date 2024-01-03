/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php"],
    theme: {
        extend: {},
        screens: {
          xs: "320px",
          sm: "640px", 
          md: "768px", 
          lg: "1024px", 
          xl: "1280px", 
      },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            white: "#ffffff",
            black: "#000000",
            "light-grey": "#EFEFF0",
            snow: "#FFFCFC",
            onyx: "#36393B",
            "tropical-indigo": "#8B85C1",
            iris: "#5248B0",
            "sea-green": "#4C934C",
        },
    },
    plugins: [],
};
