/**
 * Styles ready module
 *
 * @requires 'footerHeight' key from 'values' module
 * @requires 'waiterTimeout' key from 'values' module
 * @requires <footer> tag in DOM
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {
	return function (cb) {
		$(function domReady() {
			var $f = $('footer');
			if ($f.size() <= 0) throw new Error('Tag <footer> not found.');
			function loop() {
				if ($f.height() !== getVal('footerHeight')) {
					setTimeout(loop, getVal('waiterTimeout'));
					return;
				}
				setTimeout(cb, 1);
			}
			loop();
		}); // domReady()
	}; // return f()
}); // define()
