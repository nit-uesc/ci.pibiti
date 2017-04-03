var gulp = require('gulp')
var sass = require('gulp-sass')
var prefix = require('gulp-autoprefixer')
var plumber = require('gulp-plumber')

gulp.task('sass', function () {
  return gulp.src('src/sass/main.scss')
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(plumber())
    .pipe(prefix(['last 15 versions', '> 1%', 'ie 8'], {
      cascade: true
    }))
  .pipe(gulp.dest('layout/public/css/'))
})

gulp.task('watch', function () {
  gulp.watch('src/sass/**/*.scss', ['sass'])
})

gulp.task('default', ['sass', 'watch'])
