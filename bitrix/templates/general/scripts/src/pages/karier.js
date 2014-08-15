/**
 * "karier" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'get_val', 'relative_number'],
function ($, stylesReady, getVal, relativeNumber) {
$(function domReady() {
var $s = $('section.pit');
if ($s.size() <= 0) return;

var $w = $(window);
var $f = $('footer');

var resizeBindSuffix = '.pit_relative_values';
var rMin = getVal('minWidth');
var rMax = getVal('maxWidth');
var bqTR = [(80 - 18), ((80 - 18) + (103 - 80))];
var bqBR = [(70 - 6), ((70 - 6) + (92 - 70))];

stylesReady(function () {
	$s.each(function (i1) {
		var $s = $(this);
		var $bq = $s.find('blockquote');
		var $circles = $s.find('ul.advantages');

		// resize {{{1
		$w.on('resize' + resizeBindSuffix, function () {
			$circles.removeClass('three_cols');

			function r(min, max) {
				return relativeNumber({
					relVal: $f.width(),
					relMin: rMin,
					relMax: rMax,
					min: min,
					max: max,
				});
			}

			$bq.css({
				'padding-top': r(bqTR[0], bqTR[1]),
				'padding-bottom': r(bqBR[0], bqBR[1]),
			});

			if ($f.width() >= rMax) $circles.addClass('three_cols');
		}).trigger('resize' + resizeBindSuffix);
		// resize }}}1

		$s.find('.video_block').each(function () { // {{{1
			var $vb = $(this);
			var $video = $vb.find('video');
			$vb.find('.play').on('click', function () {
				$(this).animate(
					{'opacity': 0},
					getVal('animationSpeed'),
					getVal('animationCurve'),
					function () {
						$(this).remove();
						$video
							.attr('controls', 'controls')
							.each(function () { this.play(); });
					}
				)
				return false;
			});
		}); // .video_block }}}1
	}); // $s.each
}); // stylesReady()
}); // domReady()
}); // define()
