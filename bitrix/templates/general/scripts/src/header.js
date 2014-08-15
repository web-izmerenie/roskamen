/**
 * <header> behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'relative_number', 'get_val'],
function ($, stylesReady, relativeNumber, getVal) {
$(function domReady() {

	var $h = $('header');
	if ($h.size() <= 0) throw new Error('Tag <header> not found!');

	var $w = $(window);
	var $d = $(document);
	var $f = $('footer');

	var $siteName = $h.find('.site-name');
	var $phone = $h.find('.phone');
	var $menu = $h.find('nav.top_menu > *');

	var scrollOffsetBindSuffix = '.header_fixed_scroll_position';
	var resizeBindSuffix = '.resize_header_relative';

	var relR = [ getVal('minWidth'), getVal('maxWidth') ];
	var hhR = getVal('headerHeightRange'); // header height range
	var siteNameFSR = getVal('headerSiteNameFSRange');
	var FSR = getVal('headerFSRange');

	stylesReady(function () {

		// scroll for fixed position {{{1
		$w.on('scroll' + scrollOffsetBindSuffix, function () {
			$h.css('left', (-$d.scrollLeft()) + 'px');
		}).trigger('scroll' + scrollOffsetBindSuffix);
		// scroll for fixed position }}}1

		$w.on('resize' + resizeBindSuffix, function () {
			var fw = $f.width();

			function r(min, max) {
				return relativeNumber({
					relVal: fw,
					relMin: relR[0],
					relMax: relR[1],
					min: min,
					max: max,
				});
			}

			$h.css('height', r(hhR[0], hhR[1]) + 'px');

			var fs1 = r(siteNameFSR[0], siteNameFSR[1]);
			var fs2 = r(FSR[0], FSR[1]);
			$siteName.css({
				'font-size': fs1 + 'px',
				'line-height': (fs1 + 2) + 'px',
			});
			$phone.css({
				'font-size': fs2 + 'px',
				'line-height': (fs2 + 2) + 'px',
			});
			$menu.css({
				'font-size': fs2 + 'px',
				'line-height': (fs2 + 2) + 'px',
			});
		}).trigger('resize' + resizeBindSuffix);

	}); // stylesReady()

}); // domReady()
}); // define()
