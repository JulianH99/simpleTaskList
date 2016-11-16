const gulp = require('gulp');
const sass = require('gulp-sass');
const prfx = require('gulp-autoprefixer');

gulp.task('sass', function(){

	gulp.src('./bundles/*.scss').
	pipe(sass({
		outputStyle:'nested'
	}))
	.pipe(prfx({
		browsers:['last 4 versions']
	}))
	.pipe(gulp.dest('resources/css/'));
})

gulp.task('default', function(){
	gulp.watch('./bundles/*.scss', ['sass']);
});