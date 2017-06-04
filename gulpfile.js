'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');

gulp.task('sass', function() {
  return gulp.src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS( { processImport: false }))
    .pipe(gulp.dest('./'));
});

gulp.task('dev', function() {
  return gulp.src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./'));
});

gulp.task('default',function() {
  gulp.watch(['./**/*.scss'],['sass']);
});
