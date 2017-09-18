var gulp = require('gulp');
var uglify = require('gulp-uglify');
var pump = require('pump');
 
gulp.task('default', function (cb) {
  pump([
        gulp.src('assets/scripts/*.js'),
        uglify(),
        gulp.dest('dist/scripts')
    ],
    cb
  );
});