const mix = require("laravel-mix");
var LiveReloadPlugin = require("webpack-livereload-plugin");

mix.webpackConfig({
  plugins: [new LiveReloadPlugin()],
});

mix
  .setPublicPath("public/dist")
  .setResourceRoot("/public/dist/")
  .js("src/js/app.js", "public/dist")
  .minify("public/dist/app.js", "public/dist/app.min.js")
  .sass("src/css/style.scss", "public/dist")
  .postCss("src/css/theme.css", "public/dist", [
    require("tailwindcss"),
    require("postcss-nested"),
  ])
  .combine(
    ["public/dist/theme.css", "public/dist/style.css"],
    "public/dist/bundle.css"
  )
  .minify("public/dist/bundle.css");
