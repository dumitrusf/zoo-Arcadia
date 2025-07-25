// 1️⃣ Requiere módulos
const { src, dest, watch, series } = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass')); // Si usas SASS
const plumber = require('gulp-plumber');
const { deleteAsync } = require('del');

// 2️⃣ Ruta base para el proxy
let currentProxy = 'http://localhost:3000/'; // Por defecto: frontend

// 3️⃣ Recarga navegador
function reload(done) {
  browserSync.reload();
  done();
}

// 4️⃣ Limpiar CSS
function cleanCss() {
  return deleteAsync('./public/build/css');
}

// 5️⃣ Compilar SASS/CSS (solo app.scss principal)
function compileSass() {
  return src('src/scss/app.scss')       // ① toma SOLO app.scss principal
    .pipe(plumber())                      // ② evita errores que bloqueen
    .pipe(sass())                         // ③ compila SASS a CSS
    .pipe(dest('public/build/css'))      // ④ lo deja en public/build/css
    .pipe(browserSync.stream());         // ⑤ refresca navegador
}

// 6️⃣ Tarea combinada: limpiar + compilar
const buildCss = series(cleanCss, compileSass);

// 7️⃣ Servidor con Browsersync (para frontend o backend)
function serve(done) {
  browserSync.init({
    proxy: currentProxy,    // usa el valor dinámico según tarea
    open: true,
    notify: true
  });

  done();
}

// 8️⃣ Watch para frontend
function watchFrontend() {
  watch('src/scss/**/*.scss', buildCss);      // limpiar + compilar
  watch('public/**/*.php', reload);
  watch('public/**/*.html', reload);
  watch('public/**/*.js', reload);
  watch('public/build/css/**/*.css', reload);
}

// 9️⃣ Watch para backend (Screaming Architecture)  
function watchBackend() {
    watch('src/scss/**/*.scss', buildCss);    // también vigila CSS
    watch('App/**/*.php', reload);
    watch('includes/**/*.php', reload);
}

// 🔟 Tareas públicas para ejecutar

// 👉 Frontend: gulp public
function setFrontend(done) {
  currentProxy = 'http://localhost:3001/zoo-Arcadia/public/';
  done();
}
exports.public = series(setFrontend, buildCss, serve, watchFrontend);

// 👉 Backend: gulp app  
function setBackend(done) {
  currentProxy = 'http://localhost:3002/App/employees/views';
  done();
}
exports.app = series(setBackend, buildCss, serve, watchBackend);