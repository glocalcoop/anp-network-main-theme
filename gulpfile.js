// npm install --save-dev gulp gulp-plumber gulp-watch gulp-minify-css gulp-jshint jshint-stylish gulp-uglify gulp-rename gulp-notify gulp-include gulp-sass

var gulp = require('gulp'),
	plumber = require( 'gulp-plumber' ),
	watch = require( 'gulp-watch' ),
	minifycss = require( 'gulp-minify-css' ),
	rename = require( 'gulp-rename' ),
	notify = require( 'gulp-notify' ),
	include = require( 'gulp-include' ),
	concat = require('gulp-concat'),
	sass = require( 'gulp-sass' );

var onError = function( error ) {
	console.error( error.message );
	this.emit( 'end' );
}

// Styles
gulp.task( 'styles', function() {
	return gulp.src( './library/sass/style.scss', {
		sourceComments: 'map',
		sourceMap: 'scss',
		outputStyle: 'nested'
	} )
	.pipe( plumber( { errorHandler: onError } ) )
	.pipe( sass() )
	.pipe( gulp.dest( '.' ) )
	.pipe( minifycss() )
	.pipe( rename( { suffix: '.min' } ) )
	.pipe( gulp.dest( './library/css' ) )
	.pipe( notify({ message: 'Styles task complete' }));
} );

// Watch
gulp.task('watch', function() {

	// Watch .scss files
	gulp.watch('library/sass/**/*.scss', ['styles']);

});

gulp.task( 'default', [ 'styles', 'watch' ], function() {

} );