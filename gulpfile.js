const gulp = require( 'gulp' );
const del = require( 'del' );
const run = require( 'gulp-run' );
const zip = require( 'gulp-zip' );

gulp.task( 'bundle', function() {
	return gulp.src( [
		'**/*',
		'!bin/**/*',
		'!node_modules/**/*',
		'!vendor/**/*',
		'!composer.*',
		'!release/**/*',
	] )
		.pipe( gulp.dest( 'release/bb-vapor-modules-pro' ) );
} );

gulp.task( 'remove:bundle', function() {
	return del( [
		'release/bb-vapor-modules-pro',
	] );
} );

gulp.task( 'wporg:prepare', function() {
	return run( 'mkdir -p release' ).exec();
} );

gulp.task( 'release:copy-for-zip', function() {
	return gulp.src('release/bb-vapor-modules-pro/**')
		.pipe(gulp.dest('bb-vapor-modules-pro'));
} );

gulp.task( 'release:zip', function() {
	return gulp.src('bb-vapor-modules-pro/**/*', { base: "." })
	.pipe(zip('bb-vapor-modules-pro.zip'))
	.pipe(gulp.dest('.'));
} );

gulp.task( 'cleanup', function() {
	return del( [
		'release',
		'bb-vapor-modules-pro'
	] );
} );

gulp.task( 'clean:bundle', function() {
	return del( [
		'release/bb-vapor-modules-pro/bin',
		'release/bb-vapor-modules-pro/node_modules',
		'release/bb-vapor-modules-pro/vendor',
		'release/bb-vapor-modules-pro/tests',
		'release/bb-vapor-modules-pro/trunk',
		'release/bb-vapor-modules-pro/gulpfile.js',
		'release/bb-vapor-modules-pro/Makefile',
		'release/bb-vapor-modules-pro/package*.json',
		'release/bb-vapor-modules-pro/phpunit.xml.dist',
		'release/bb-vapor-modules-pro/README.md',
		'release/bb-vapor-modules-pro/CHANGELOG.md',
		'release/bb-vapor-modules-pro/webpack.config.js',
		'release/bb-vapor-modules-pro/.editorconfig',
		'release/bb-vapor-modules-pro/.eslistignore',
		'release/bb-vapor-modules-pro/.eslistrcjson',
		'release/bb-vapor-modules-pro/.git',
		'release/bb-vapor-modules-pro/.gitignore',
		'release/bb-vapor-modules-pro/src/block',
		'package/prepare',
	] );
} );

gulp.task( 'default', gulp.series(
	'remove:bundle',
	'bundle',
	'wporg:prepare',
	'clean:bundle',
	'release:copy-for-zip',
	'release:zip',
	'cleanup'
) );
