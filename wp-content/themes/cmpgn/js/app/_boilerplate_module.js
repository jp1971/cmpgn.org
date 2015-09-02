/**
 * Name
 * @description Description
 */
define(

	// what does this module rely on?
	[
		'jquery',
		'util'
	],

	// let's pass in aliases for the dependencies
	// capitalize any external modules
	function (
		$,
		Util
	) {

		// define any private variables
		var name = '',
			debugEnable = true,
			debug = debugEnable ? Util.debug : function () {}
		;

		//////////////////////////////////////////////////////////////////////////////////////

		/**
		 * Initialize Module
		 */
		function init() {

			debug( name + ': initialized' );

		}

		/**
		 * Private Method
		 */
		function privateMethod() {

		}

		//////////////////////////////////////////////////////////////////////////////////////

		// insert init if module should auto-initialize
		init();

		// return any public methods
		return {
			init: init
		};
	}
);