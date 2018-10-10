let gulp = require('gulp');
let sass = require('gulp-sass');

gulp.task('sass', function () {
  return gulp.src('src/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('src/css'));
});

gulp.task('sass:watch', function () {
  gulp.watch('src/sass/*.scss', ['sass']);
});