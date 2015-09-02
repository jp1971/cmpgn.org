/**
 * RequireJS Main.js
 * @description Define jQuery module and require app modules
 */
define( 'jquery', [], function () {
	return jQuery;
} );

requirejs.config( {
	'paths': {
		'app': 'app',
		'bower': '../bower_components',
		'throttle-debounce': '../bower_components/jquery-throttle-debounce/jquery.ba-throttle-debounce.min'
	},
	'shim': {
		'throttle-debounce': {
			deps: [ 'jquery' ]
		}
	}
} );

requirejs( [
] );