/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var cbpAnimatedHeader = (function() {

	var docElem;
	var header;
	var didScroll = false;
	var changeHeaderOn = 300;

	function init() {
		//alert("hello init");
		docElem = document.documentElement;
		header = docElem.getElementsByClassName("navbar-default");
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			//classie.add( header, 'navbar-shrink' );
			//header.classList.remove('affix-top');
			header[0].classList.toggle('affix');
		}
		else {
			//classie.remove( header, 'navbar-shrink' );
			//header.classList.add('affix-top');
			header[0].classList.toggle('affix');
		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();

})();
