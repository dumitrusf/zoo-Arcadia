// Import functions (src, dest, watch) from Gulp
import gulp, { src, dest, watch } from "gulp";

// Import default export from gulp-dart-sass and extract required properties
import dartSassPkg from "gulp-dart-sass";
const { sync: dartSassSync, logError } = dartSassPkg; // Extracción del método sync y logError

// Import deleteAsync from 'del' to 1st delete in compilation
import { deleteAsync } from 'del';

// Task to delete build/css directory to prevent errors
export function cleanCss() {
    return deleteAsync('build/css');
}

// Task to compile Sass using gulp-dart-sass
export function css(done) {
    return src("src/scss/app.scss")
    // Use dartSassSync and handle errors
        .pipe(dartSassSync().on('error', logError))  
        .pipe(dest("build/css"));
    done();
}

// Watch for changes in SCSS files
export function watchCss() {
    watch('src/scss/**/*.scss', css);
}

// Task to clean, compile, and watch
export const compileCss = gulp.series(cleanCss, css, watchCss);
