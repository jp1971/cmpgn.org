/**
 * Utilities
 */
define( [ 'jquery' ], function ( $ ) {

	var name = 'Util',
		debug = function () {}
	;

	//////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Debug - console.log wrapper
	 *
	 * @param mixed obj
	 */
	debug = function () {

		if ( typeof console !== 'object' || ! console.log ) {
			return;
		}

		return Function.prototype.bind.call( console.log, console );

	}();

	/**
	 * Set window.requestAnimationFrame
	 *
	 * requestAnimationFrame Firefox 23 / IE 10 / Chrome / Safari 7 (incl. iOS)
	 * mozRequestAnimationFrame Firefox < 23
	 * webkitRequestAnimationFrame Older versions of Safari / Chrome
	 */
	( function setWindowRequestAnimationFrame() {

		window.requestAnimationFrame = window.requestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.oRequestAnimationFrame;

	} )();

	//////////////////////////////////////////////////////////////////////////////////////

	function fluidImage() {

		var $collection = $( '.fluid-image' );

		$.each( $collection, function ( index, node ) {

			var $this = $( node ),
				$image = $this.find( 'img' ),
				bg_img = $image.attr( 'src' ),
				bg_img_str = 'url(' + bg_img + ')',
				bgImgOpacity = $this.data( 'image-opacity' ) || 1
			;

			if ( $image.data( 'altPhone' ) ) {

				bg_img = $image.data( 'altPhone' );

			} else {

				bg_img = $image.attr( 'src' );

			}

			bg_img_str = 'url(' + bg_img + ')';

			$this
				.addClass( 'bg--image' )
				.css( 'background-image', bg_img_str )
			;

			$image.hide();

			$this.stop().animate({
				'opacity': bgImgOpacity
			});

		});

	}

	//////////////////////////////////////////////////////////////////////////////////////

	return {
		debug: debug,
		fluidImage: fluidImage
	};

} );