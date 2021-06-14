
const { src, dest, series, watch } = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const clean = require('gulp-clean');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const gulp = require('gulp');
const browserSync = require('browser-sync').create();

const path = {
    src: {
        all: './assets/',
        scss: './assets/scss/**/*.scss',
        js: './assets/js/**/*.js',
        img: './assets/img/**/*'
    },
    dest: {
        all: './public/build/',
        css: './public/build/css/',
        js: './public/build/js/',
        img: './public/build/img/'
    },
    views: {
        all: './views/**/*',
    }
}

const cleanTask = () => {
    return src(path.dest.all, {allowEmpty: true})
        .pipe(clean());
}

const scss = () => {
    return src(path.src.scss)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(dest(path.dest.css))
}

const js = () => {
    return src(path.src.js)
        .pipe(uglify())
        .pipe(dest(path.dest.js));
}

const img = () => {
    return src(path.src.img)
        .pipe(dest(path.dest.img));
}

const reload = (done) => {
    browserSync.reload();
    done();
}

const dev = () => {
    browserSync.init({
        proxy: "localhost:80"
    });
    watch([path.src.js, path.src.scss, path.views.all], { events: 'change' }, series(cleanTask, scss, js, reload));
}

exports.dev = dev;
exports.clean = cleanTask;
exports.default = series(cleanTask, scss, js, img);