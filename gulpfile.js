var gulp       = require('gulp'),
    notify     = require('gulp-notify'),
    livereload = require('gulp-livereload')
    gutil      = require('gulp-util'),
    compass    = require('gulp-compass'),
    uglify     = require('gulp-uglify'),
    concat     = require('gulp-concat'),
    rename     = require('gulp-rename'),
    source     = require('vinyl-source-stream'),
    browserify = require('gulp-browserify'),
    favicons   = require('gulp-favicons');

var paths = {
    scss: 'resources/scss',
    css: 'assets/css',
    views: '*.php',
    js: {
        source: 'resources/js',
        dest: 'assets/js'
    }
};

gulp.task('sass', function() {
    gulp.src(paths.scss + '/**/*.scss')
        .pipe(compass({
            output_style: 'compressed',
            css: paths.css,
            sass: paths.scss
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest(paths.css))
        .pipe(livereload());
});

gulp.task('uglify:vendor', function() {
    gulp.src([
            'resources/components/jquery/dist/jquery.js',
            'resources/components/share-bar/dist/js/share-bar.min.js'
        ])
        .pipe(uglify())
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest('assets/vendor'));
});

gulp.task('scripts:app', function() {
    gulp.src([paths.js.source + '/**/*.js', '!' + paths.js.source + '/modules/**'])
        .pipe(browserify())
        .on('error', gutil.log)
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('assets/js'))
        .pipe(livereload());
});

// watching the files
gulp.task('watch', function() {
    livereload.listen();

    gulp.watch(paths.scss      + '/**/*.scss', ['sass']);
    gulp.watch(paths.js.source + '/**/*.js', ['scripts:app']);
    gulp.watch(paths.views     + '/**/*.php', ['reload']);
});

gulp.task('reload', function() {
    gulp.src('gulpfile.js')
        .pipe(livereload());
});

gulp.task('default', function() {
    gulp.start('sass', 'scripts:app', 'watch');
});
