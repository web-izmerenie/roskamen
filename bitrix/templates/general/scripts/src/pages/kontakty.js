/**
 * "kontakty" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'get_val'], function ($, stylesReady, getVal) {
$(function domReady() {
var $s = $('section.contacts');
if ($s.size() <= 0) return;

var imapResizeBindSuffix = '.interactive_map_resize';
var $w = $(window);
var imapRatio = getVal('kontaktyMapRatio');

stylesReady(function () {

	$s.each(function () {
		var $s = $(this);
		var $imap = $s.find('.imap'); // interactive map

		$w.on(
			'resize' + imapResizeBindSuffix,
			$.proxy(setTimeout, null, function () {
				$imap.css(
					'height',
					$imap.width() * imapRatio[1] / imapRatio[0] + 'px'
				);
			}, 1)
		).trigger('resize' + imapResizeBindSuffix);
	});

}); // stylesReady()
}); // domReady()
}); // define()
