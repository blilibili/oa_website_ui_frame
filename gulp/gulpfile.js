/**
 * Created by liyigang on 27/2/18.
 */
var gulp = require('gulp');
var less = require('gulp-less');

gulp.task('less' , function(){
    gulp.src('../public/css/**.less')
        .pipe(less())
        .pipe(gulp.dest('../public/css'))
});

gulp.task('dev' , function(){
    gulp.watch('../public/css/**.less' , ['less']);
})

gulp.task('default' , ['less' , 'dev']);