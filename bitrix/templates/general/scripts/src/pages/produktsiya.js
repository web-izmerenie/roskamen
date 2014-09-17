/**
 * "produktsiya" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'get_val', 'relative_number'],
function ($, stylesReady, getVal, relativeNumber) {
$(function domReady() {
var $s = $('section.production');
if ($s.size() <= 0) return;

var $w = $(window);
var $footer = $('footer');

stylesReady(function () {
	$s.each(function () {
		var $s = $(this);
		var $advantagesList = $s.find('ul.advantages > li');
		var $prodListPics = $s.find('ul.production_list > li img');

		// relative sizes {{{1

		var resizeBindSuffix = '.relative_size_of_production';

		var advantagesWidth = 145;
		var advantagesWidthMin = advantagesWidth + 82;
		var advantagesWidthMax = advantagesWidth + 160;

		var productionPhotoMin = 820;
		var productionPhotoMax = 1070;

		var rMin = getVal('minWidth');
		var rMax = getVal('maxWidth');

		// resize {{{2
		$w.on('resize' + resizeBindSuffix, function () {
			function r(min, max) {
				return relativeNumber({
					relVal: $footer.width(),
					relMin: rMin,
					relMax: rMax,
					min: min,
					max: max,
				});
			}

			$advantagesList.css(
				'width', r(advantagesWidthMin, advantagesWidthMax) + 'px');
			$prodListPics.css(
				'width', r(productionPhotoMin, productionPhotoMax) + 'px');
		}).trigger('resize' + resizeBindSuffix);
		// resize }}}2

		// relative sizes }}}1
	}); // $s.each
}); // stylesReady()
}); // domReady()
}); // define()
