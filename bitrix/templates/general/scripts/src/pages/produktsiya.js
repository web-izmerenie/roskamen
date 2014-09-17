/**
 * "produktsiya" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'get_val', 'relative_number'],
function ($, stylesReady, getVal, relativeNumber) {
$(function domReady() {
var $s = $('section.production');
var $sd = $('section.production_detail');

if ($s.size() <= 0 && $sd.size() <= 0) return;

var $w = $(window);
var $d = $(document);
var $html = $('html');
var $body = $('body');
var $footer = $('footer');

var rMin = getVal('minWidth');
var rMax = getVal('maxWidth');
var advantagesWidth = 145;
var advantagesWidthMin = advantagesWidth + 80;
var advantagesWidthMax = advantagesWidth + 160;
var productionPhotoMin = 820;
var productionPhotoMax = 1070;

stylesReady(function () {
	// list page {{{1
	$s.each(function () {
		var $s = $(this);
		var $advantages = $s.find('ul.advantages');
		var $advantagesList = $advantages.find('>li');
		var $prodListPics = $s.find('ul.production_list > li img');

		var $advantClone = $advantages.clone().addClass('production');
		$body.append($advantClone);

		var $advantCloneLI = $advantClone.find('>li');
		var $advantCloneP = $advantCloneLI.find('p');
		var $advantClonePLast = $advantCloneLI.last().find('p');

		var scrollBindSuffix = '.scroll_production';

		$w.on('scroll' + scrollBindSuffix, function () {
			$advantClone.css('left', (-$d.scrollLeft()) + 'px');

			if (
				$d.scrollTop() >
				$advantages.offset().top + $advantages.innerHeight())
			{
				$html.addClass('advantages_production');
			} else {
				$html.removeClass('advantages_production');
			}
		}).trigger('scroll' + scrollBindSuffix);

		// relative sizes {{{2

		var resizeBindSuffix = '.relative_size_of_production';

		var advantCloneWidthMin = 140;
		var advantCloneWidthMax = 220;
		var advantCloneWidthMax = 160;

		// resize {{{3
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
			$advantCloneP.css(
				'width', r(advantCloneWidthMin, advantCloneWidthMax) + 'px');
			$advantClonePLast.css(
				'width', r(advantCloneWidthMin, advantCloneWidthMax) + 'px');
		}).trigger('resize' + resizeBindSuffix);
		// resize }}}3

		// relative sizes }}}2
	});
	// list page }}}1

	// detail page {{{1
	$sd.each(function () {
		var $s = $(this);
		var $bq = $s.find('blockquote');
		var $advantagesList = $s.find('ul.advantages > li');
		var $pic = $s.find('img.picture');

		var resizeBindSuffix = '.production_detail_page_relative_size';
		var bqTR = getVal('blockquoteRatio').top;
		var bqBR = getVal('blockquoteRatio').bottom;

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

			$bq.css({
				'padding-top': '',
				'padding-bottom': '',
			});
			$advantagesList.css('width', '');
			$pic.css('width', '');

			$bq.css({
				'padding-top': r(bqTR[0], bqTR[1]),
				'padding-bottom': r(bqBR[0], bqBR[1]),
			});
			$advantagesList.css(
				'width', r(advantagesWidthMin, advantagesWidthMax) + 'px');
			$pic.css(
				'width', r(productionPhotoMin, productionPhotoMax) + 'px');
		}).trigger('resize' + resizeBindSuffix);
	});
	// detail page }}}1
}); // stylesReady()
}); // domReady()
}); // define()
