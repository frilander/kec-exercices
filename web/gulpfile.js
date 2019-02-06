'use strict';

var gulp = require('gulp');

// SASS

var gulp = require('gulp');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');




// frontend CSS
gulp.task('css', function () {

    // Compile SASS files
    var sassFiles = gulp.src('./resources/sass/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css/'));
});


gulp.task('css:watch', ['css'], function () {
    return gulp.watch(
        [
            './framework/resources/sass/**/**/*.scss',
            './framework/resources/components/**/*.scss',
        ],
        ['css'])
});

