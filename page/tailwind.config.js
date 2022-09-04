module.exports = {
  content: require("fast-glob").sync(["./**/*.html", "./**/*.md"]),
  theme: {
    extend: {
      colors: {
        primary: {
          120: "#034663",
          110: "#044F70",
          DEFAULT: "#04587C",
          90: "#1E698A",
          80: "#367A96",
          70: "#508BA4",
          60: "#689BB1",
          50: "#82ACBE",
          40: "#9BBCCB",
          30: "#B4CDD8",
          20: "#CDDEE5",
          10: "#E6EFF2",
        },
        secondary: {
          120: "#400363",
          110: "#480470",
          DEFAULT: "#50047C",
          90: "#611D89",
          80: "#733696",
          70: "#854FA3",
          60: "#9668B0",
          50: "#A781BD",
          40: "#B99BCB",
          30: "#CBB4D8",
          20: "#DCCDE5",
          10: "#EEE6F2",
        },
      },
    },
  },
  plugins: [],
};
