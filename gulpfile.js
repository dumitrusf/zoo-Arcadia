// 1️⃣ Requiere módulos
const { src, dest, watch, series } = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass')); // Si usas SASS
const plumber = require('gulp-plumber');
const { deleteAsync } = require('del');

// 2️⃣ Módulos adicionales para JS
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');

// 3️⃣ Rutas de archivos
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    vendorJs: [
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/datatables.net/js/dataTables.min.js',
        'node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js'
    ],
    vendorCss: [
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css'
    ]
};

// 4️⃣ Ruta base para el proxy
let currentProxy = 'http://localhost:3000/'; // Por defecto: frontend

// 5️⃣ Recarga navegador
function reload(done) {
  browserSync.reload();
  done();
}

// 6️⃣ Limpiar directorios
function cleanCss() {
  return deleteAsync('./public/build/css');
}

function cleanJs() {
  return deleteAsync('./public/build/js');
}

// 7️⃣ Procesar y compilar archivos
function compileSass() {
  return src('src/scss/app.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(dest('public/build/css'))
    .pipe(browserSync.stream());
}

function processJs() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('app.js')) // Unifica todos los .js de src/js en uno solo
        .pipe(terser()) // Comprime/minifica el JS
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/js'));
}

function copyVendorJs() {
    return src(paths.vendorJs)
        .pipe(dest('public/build/js'));
}

function copyVendorCss() {
    return src(paths.vendorCss)
        .pipe(dest('public/build/css'));
}

// 8️⃣ Tareas combinadas
const buildCss = series(cleanCss, compileSass, copyVendorCss);
const buildJs = series(cleanJs, processJs, copyVendorJs);

// 9️⃣ Servidor con Browsersync
function serve(done) {
  browserSync.init({
    proxy: currentProxy,    // usa el valor dinámico según tarea
    open: true,
    notify: true
  });

  done();
}

// 🔟 Watchers
function watchFrontend() {
  watch(paths.scss, buildCss);
  watch(paths.js, series(buildJs, reload)); // build y luego reload
  watch('public/**/*.php', reload);
  watch('public/**/*.html', reload);
  watch('public/**/*.js', reload);
  watch('public/build/css/**/*.css', reload);
}

function watchBackend() {
    watch(paths.scss, buildCss);
    watch(paths.js, series(buildJs, reload)); // build y luego reload
    watch('App/**/*.php', reload);
    watch('includes/**/*.php', reload);
}

// 1️⃣1️⃣ Tareas públicas para ejecutar

// 👉 Frontend: gulp public
function setFrontend(done) {
  currentProxy = 'http://localhost:3001'; // Directamente al puerto del servidor PHP
  done();
}
exports.public = series(setFrontend, buildCss, buildJs, serve, watchFrontend);

// 👉 Backend: gulp app  
function setBackend(done) {
  currentProxy = 'http://localhost:3002/home/pages/start'; // Ahora todo va por el 3001
  done();
}
exports.app = series(setBackend, buildCss, buildJs, serve, watchBackend);