require('dotenv').config()

const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const mysqldump = require("mysqldump");
require("laravel-mix-purgecss");

/* ==========================================================================
  Config
  ========================================================================== */
// if (mix.inProduction()) {
//   mysqldump({
//     connection: {
//       host: process.env.DB_HOST,
//       user: process.env.DB_USER,
//       password: process.env.DB_PASS,
//       database: process.env.DB_NAME,
//       port: process.env.DB_PORT,
//     },
//     dumpToFile: "./" + process.env.DB_NAME + '.sql',
//   });
// }


/* ==========================================================================
  Config
  ========================================================================== */
const config = {
  siteUrl: process.env.SITE_URL,
  proxyUrl: process.env.SITE_URL,
  // browser: "google chrome",
  port: 80,
  openOnStart: true,
  pathToLocalSSLCert: "",
  pathToLocalSSLKey: "",
  filesToWatch: [
    "./themes/" + process.env.THEME_NAME + "/**/*.php",
    "./themes/" + process.env.THEME_NAME + "/**/*.html",
    "dev/css/**/*.css",
    "dev/css/**/*.scss",
    "dev/js/**/*.js",
    "tailwind.config.js",
  ],
};

/* ==========================================================================
    Purge CSS Extractors
    ========================================================================== */
class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-z0-9-:\/]+/g) || [];
  }
}
/* ==========================================================================
  Laravel Mix Config
  ========================================================================== */

  mix.js(["./dev/js/app.js", "./dev/js/navigation.js"], "./themes/" + process.env.THEME_NAME + "/assets/js/bundle.js");
  mix.js("./dev/js/slider.js", "./themes/" + process.env.THEME_NAME + "/assets/js/slider.js");
  mix.js("./dev/js/skip-link-focus-fix.js", "./themes/" + process.env.THEME_NAME + "/assets/js/skip-link-focus-fix.js");
mix
  .sass("./dev/css/app.scss", "./themes/" + process.env.THEME_NAME + "/assets/css/bundle.css")
  .options({
    processCssUrls: false,
    postCss: [
      tailwindcss("./tailwind.config.js"),
      require("autoprefixer")({
        browsers: ["last 2 versions"],
      }),
    ],
  })
  .purgeCss({
    enabled: mix.inProduction(),
    content: [
      path.join(__dirname, "./themes/" + process.env.THEME_NAME + "/**/*.php"),
      path.join(__dirname, "./themes/" + process.env.THEME_NAME + "/template-parts/**/*.php"),
      path.join(__dirname, "./themes/" + process.env.THEME_NAME + "/page-templates/**/*.php"),
      path.join(__dirname, "./themes/" + process.env.THEME_NAME + "/src/**/*.php"),
      // path.join(__dirname, "./b7762670759331.sql"),
      // path.join(__dirname, "./" + process.env.DB_NAME + '.sql'),
    ],
    whitelist: [
      // "list-disc",
      // "list-decimal",
      // "w-auto",
      // "bg-fixed",
      // "bg-no-repeat",
      // "bg-cover",
      // "bg-center",
      // "w-1/2",
      // "sr-only",
      // "w-1/2",
      // "pr-4",
      // "mr-4", 
      // "border-r", 
      // "border-gray-300",
    ],
    whitelistPatterns: [/wpcf7$/],
  });

if (mix.inProduction()) {
  mix.minify("./themes/" + process.env.THEME_NAME + "/assets/css/bundle.css");
  mix.minify("./themes/" + process.env.THEME_NAME + "/assets/js/bundle.js");
}

if (!mix.inProduction()) {
  // BrowserSync
  mix.browserSync({
    browser: config.browser,
    proxy: config.proxyUrl,
    host: config.siteUrl,
    open: config.openOnStart,
    port: config.port,
    https: false,
    files: config.filesToWatch,
  });
}
