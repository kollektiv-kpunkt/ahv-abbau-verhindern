module.exports = {
  content: require("fast-glob").sync(["./**/*.html", "./**/*.md"]),
  theme: {
    extend: {
      colors: {
        primary: {
          120: "var(--primary-120)",
          110: "var(--primary-110)",
          DEFAULT: "var(--primary)",
          90: "var(--primary-90)",
          80: "var(--primary-80)",
          70: "var(--primary-70)",
          60: "var(--primary-60)",
          50: "var(--primary-50)",
          40: "var(--primary-40)",
          30: "var(--primary-30)",
          20: "var(--primary-20)",
          10: "var(--primary-10)",
        },
      },
    },
  },
  plugins: [],
};
