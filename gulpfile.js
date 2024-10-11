// Import functions (src, dest, watch) from Gulp
import gulp, { src, dest, watch, series } from "gulp";

// Import default export from gulp-dart-sass and extract required properties
import dartSassPkg from "gulp-dart-sass";
const { sync: dartSassSync, logError } = dartSassPkg;

// Import deleteAsync from 'del' for cleaning
import { deleteAsync } from 'del';

// Import Browsersync for live-reload
import browserSync from 'browser-sync';

// Initialize Browsersync
const bs = browserSync.create();

// Task to clean build/css directory
export function cleanCss() {
    return deleteAsync('build/css');
}

// Task to compile Sass using gulp-dart-sass
export function css(done) {
    return src("src/scss/app.scss")
        .pipe(dartSassSync().on('error', logError))
        .pipe(dest("build/css"))
        .pipe(bs.stream());  // Inyecta el CSS sin recargar toda la página
    done();
}

// Task to reload the browser on changes to any file
function reload(done) {
    bs.reload();  // Recarga el navegador completamente
    done();
}

// Watch for changes in SCSS files and any other files
export function watchCss() {
    // Initialize Browsersync server with correct proxy settings
    bs.init({
        proxy: "localhost:3000",  // Proxy hacia tu servidor PHP
        port: 3001,  // Asegura que Browsersync use el puerto 3001 sin conflictos
        notify: false,  // Desactiva las notificaciones en el navegador
        open: true,  // Abre automáticamente el navegador en localhost:3001
    });

    // Observa los cambios en SCSS y compila
    watch('src/scss/**/*.scss', css);

    // Observa los cambios en *todos* los archivos y recarga el navegador
    watch(['*.php', '*.html', '*.js', '*.css'], reload);  // Recarga cuando cualquier archivo cambia
}

// Task to clean, compile, and watch
export const compileCss = series(cleanCss, css, watchCss);
