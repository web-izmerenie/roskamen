/**
 * <header> behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready'], function ($, stylesReady) {
$(function domReady() {
var $h = $('header');
if ($h.size() <= 0) throw new Error('Tag <header> not found!');
stylesReady(function () {

	var $w = $(window);
	var $d = $(document);

	var scrollOffsetBindSuffix = '.header_fixed_scroll_position';

	// scroll for fixed position {{{1
	$w.on('scroll' + scrollOffsetBindSuffix, function () {
		$h.css('left', (-$d.scrollLeft()) + 'px');
	}).trigger('scroll' + scrollOffsetBindSuffix);
	// scroll for fixed position }}}1

}); // stylesReady()
}); // domReady()
}); // define()
