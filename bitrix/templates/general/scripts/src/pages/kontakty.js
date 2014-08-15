/**
 * "kontakty" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready'], function ($, stylesReady) {
$(function domReady() {
var $s = $('section.contacts');
if ($s.size() <= 0) return;
stylesReady(function () {

	$s.each(function () {
		var $s = $(this);
		var $imap = $s.find('.imap');

		//
	});

}); // stylesReady()
}); // domReady()
}); // define()
