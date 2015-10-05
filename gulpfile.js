'use strict';

var gulp = require('gulp');
var del = require('del');
var uglify = require('gulp-uglify');
var browserify = require('gulp-browserify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var merge = require('merge-stream');

gulp.task('browserify', function(){
    gulp.src('resources/js/main.js')
        .pipe(browserify({transform: 'reactify'}))
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
});

gulp.task('css', function(){

    var bootstrap = gulp.src('resources/vendor/bootstrap/dist/css/bootstrap.min.css')
        .pipe(gulp.dest('public/css'));

    return merge(bootstrap);
});

gulp.task('js', function(){

    var jquery = gulp.src('resources/vendor/jquery/dist/jquery.min.js')
        .pipe(gulp.dest('public/js'));

    var bootstrap = gulp.src('resources/vendor/bootstrap/dist/js/bootstrap.min.js')
        .pipe(gulp.dest('public/js'));

    var arrowJs = gulp.src('resources/vendor/arrow-js/src/js/arrow.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));

    return merge(jquery, bootstrap, arrowJs);
});

gulp.task('default', ['css', 'js', 'browserify']);

gulp.task('watch', function(){
    gulp.watch('resources/js/**/*.*', ['browserify'])
});


// Clean
gulp.task('clean', function(cb) {
    del(['public/js', 'public/css'], cb);
});