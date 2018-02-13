var gulp = require('gulp'),
    less = require('gulp-less'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    cssnano = require('cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    merge = require('merge-stream');

gulp.task('less', function() {
    return gulp.src('./less/style.less')
        .pipe(sourcemaps.init())
        .pipe(less().on('error', function(err) {
            console.log(err);
        }))
        .pipe(postcss([ autoprefixer() ]))
        .pipe(gulp.dest('./www/assets/build/'))
        .pipe(postcss([
            cssnano({
                preset: 'default'
            })
        ]))
        .pipe(sourcemaps.write('./maps'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./www/assets/build/'));
});

var jsFiles = [
        './node_modules/jquery/dist/jquery.js',
        './node_modules/what-input/dist/what-input.js',
        './node_modules/spin.js/spin.js',
        './node_modules/spin.js/jquery.spin.js',
        './node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        './node_modules/slick-carousel/slick/slick.js',
        './node_modules/jquery-modal/jquery.modal.js',
        './node_modules/jquery-validation/dist/jquery.validate.js',
        './node_modules/devbridge-autocomplete/dist/jquery.autocomplete.js',
        './node_modules/baron/baron.min.js',
        './js/components/**/*.js',
        './js/scripts.js'
    ],
    jsDest = './www/assets/build';

gulp.task('scripts', function() {
    var mainScripts = gulp.src(jsFiles)
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(jsDest));

    var programTable = gulp.src('./js/program-table.js')
        .pipe(sourcemaps.init())
        .pipe(gulp.dest(jsDest))
        .pipe(rename('program-table.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(jsDest));

    return merge(mainScripts, programTable);
});

gulp.task('default', ['less', 'scripts'], function() {
    gulp.watch('./less/**/*.less', ['less']);
    gulp.watch('./js/**/*.js', ['scripts']);
});