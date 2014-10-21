/**
 * 404 error page behavior
 *
 * @author Viacheslav Lotsmanov
 * @license GNU/AGPLv3
 * @see {@link https://github.com/web-izmerenie/roskamen/blob/master/LICENSE-AGPLv3|License}
 */

define(['jquery', 'styles_ready'],
function ($, stylesReady) {
$(function domReady() {
var $html = $('html');
if (!$html.hasClass('error_404')) return;

var $w = $(window);
var $header = $('header');
var $footer = $('footer');
var $block = $html.find('body .main_block .error_404');

var bindSuffix = '.error_404_page';

stylesReady(function () {

	$block.each(function () {
		var $block = $(this);

		var resizeHandler = $.proxy(setTimeout, null, function () {
			$block.css('margin-top', '');
			var hh = $header.innerHeight();
			var fh = $footer.innerHeight();
			var oh = $block.innerHeight();
			var wh = $w.height();
			var nh = ((wh - hh - fh) - oh) / 2;
			if (nh > 0)
				$block.css('margin-top', nh + 'px');
		}, 1);

		$w.on('resize' + bindSuffix, resizeHandler);
		$w.trigger('resize' + bindSuffix);
	});

}); // stylesReady()
}); // domReady()
}); // define()
