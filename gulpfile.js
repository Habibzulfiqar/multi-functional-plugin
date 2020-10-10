 // Load Gulp...of course
var gulp         = require( 'gulp' );

// CSS related plugins
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var minifycss    = require( 'gulp-uglifycss' );

// JS related plugins
var concat       = require( 'gulp-concat' );
var uglify       = require( 'gulp-uglify' );
var babelify     = require( 'babelify' );
var browserify   = require( 'browserify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var stripDebug   = require( 'gulp-strip-debug' );

// Utility plugins
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var notify       = require( 'gulp-notify' );
var plumber      = require( 'gulp-plumber' );
var options      = require( 'gulp-options' );
var gulpif       = require( 'gulp-if' );

// Browers related plugins
var browserSync  = require( 'browser-sync' ).create();
 
// Project related variables
var projectURL   = 'http://me.habib.com/';

var styleSRC     = './src/scss/mystyle.scss';
var styleURL     = './assets/';
var mapURL       = './';

var jsSRC        = './src/js/myscript.js';
var jsURL        = './assets/';

var styleWatch   = './src/scss/**/*.scss';
var jsWatch      = './src/js/**/*.js';
var phpWatch     = './**/*.php';

// Tasks
 
   function browser_Sync() {

	browserSync.init({
		proxy: projectURL,
		injectChanges: true,
		open: false
	});
	// browserSync.init({

	// 	server: {
	// 		baseDir: "./"
	// 	}
	// });

}

function reload(done) {

	browserSync.reload();

	done();

}

 function styles( done ) {
	gulp.src( styleSRC )
		.pipe( sourcemaps.init() )
		.pipe( sass({
			errLogToConsole: true,
			outputStyle: 'compressed'
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer() )
		.pipe( sourcemaps.write( mapURL ) )
		.pipe( gulp.dest( styleURL ) )
		.pipe( browserSync.stream() );

		done();
}

  function js(done) {
	return browserify({
		entries: [jsSRC]
	})
	.transform( babelify, { presets: [ '@babel/preset-env' ] } )
	.bundle()
	.pipe( source( 'myscript.js' ) )
	.pipe( buffer() )
	.pipe( gulpif( options.has( 'production' ), stripDebug() ) )
	.pipe( sourcemaps.init({ loadMaps: true }) )
	.pipe( uglify() )
	.pipe( sourcemaps.write( '.' ) )
	.pipe( gulp.dest( jsURL ) )
	.pipe( browserSync.stream() );

	// gulp.src( jsSRC )
	// .pipe( gulp.dest( jsURL ) );

	 done();
 }

function triggerPlumber( src, url ) {
	return gulp.src( src )
	.pipe( plumber() )
	.pipe( gulp.dest( url ) );
}
function watch_files(){

	gulp.watch( phpWatch, gulp.series( reload ));
	gulp.watch( styleWatch, gulp.series( styles ));
	gulp.watch( jsWatch, gulp.series( js, reload ) );
	gulp.src( jsURL + 'myscript.js' )
		.pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
}
gulp.task( 'styles' , styles);
gulp.task( 'browser-sync' , browser_Sync);
gulp.task( 'js' , js);
gulp.task( 'default', gulp.parallel( styles, js ));
gulp.task( 'watch', gulp.parallel(browser_Sync, watch_files));
