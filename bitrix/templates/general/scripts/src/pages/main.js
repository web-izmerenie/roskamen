/**
 * main page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'get_val', 'relative_number'],
function ($, stylesReady, getVal, relativeNumber) {
$(function domReady() {
var $html = $('html');
if (!$html.hasClass('main_page')) return;

var $w = $(window);
var $header = $('header');
var $footer = $('footer');

var bindSuffix = '.main_page';

var rMin = getVal('minWidth');
var rMax = getVal('maxWidth');
var slideSizeR = [480, 733];
var slideBrdR = [11, 17];
var nextSizeWR = [25, 38];
var nextSizeHR = [14, 22];
var nextBotR = [32, 32+14];
var textFSR = [25, 38];
var textLHR = [28, 43];
var textBR = [71, 71+(119-81)];

stylesReady(function () {

	var $slides = $('ul.slides li');
	var $slide = $('.slide');
	var $next = $slide.find('.next');
	var $bg = $slide.find('.bg');
	var $text = $slide.find('.text');
	var $tInside = $text.find('.inside');

	var cur = 0;
	var animate = false;

	function slideGo() { // {{{1
		if (animate) return false; else animate = true;

		cur++;
		var $target = $slides.eq(cur);

		if ($target.size() <= 0) {
			cur = 0;
			$target = $slides.eq(cur);
		}

		applySlide($target);

		return false;
	} // slideGo() }}}1

	function applySlide($target) { // {{{1
		$slide.css('border-color', $target.attr('data-color'));
		$text.animate(
			{ 'opacity': '0' },
			getVal('animationSpeed'),
			getVal('animationCurve'),
			function () {
				$tInside.html( $target.find('h3').html() );
				$text.animate(
					{ 'opacity': '1' },
					getVal('animationSpeed') * 4,
					getVal('animationCurve')
				);
			}
		);
		$bg.animate(
			{ 'margin-top': '100%' },
			getVal('animationSpeed'),
			getVal('animationCurve'),
			function () {
				$bg.css('margin-top', '-100%');
				$bg.html('<img alt="" src="'+ $target.find('img').attr('src') +'">');
				$bg.animate(
					{ 'margin-top': '0' },
					getVal('animationSpeed') * 4,
					getVal('animationCurve'),
					function () {
						setTimeout(function () {
							animate = false;
						}, 1);
					}
				);
			}
		);
	} // applySlide() }}}1

	applySlide($slides.eq(cur));

	$next.on('click', slideGo);

	$w.on('resize' + bindSuffix, function () { // {{{1
		// reset
		$slide.css({
			'margin-top': '',
			'width': '',
			'height': '',
			'border-radius': '',
			'border-width': '',
		});
		$next.css({
			'width': '',
			'height': '',
			'bottom': '',
			'margin-left': '',
		});
		$text.css({
			'font-size': '',
			'line-height': '',
			'bottom': '',
		});

		var relVal = $footer.width();
		function r(min, max) {
			return relativeNumber({
				relVal: relVal,
				relMin: rMin,
				relMax: rMax,
				min: min,
				max: max,
			});
		}

		var s = r(slideSizeR[0], slideSizeR[1]);
		$slide.css({
			'width': s + 'px',
			'height': s + 'px',
			'border-radius': (s/2) + 'px',
			'border-width': r(slideBrdR[0], slideBrdR[1]) + 'px',
		});
		$next.css({
			'width': r(nextSizeWR[0], nextSizeWR[1]) + 'px',
			'height': r(nextSizeHR[0], nextSizeHR[1]) + 'px',
			'bottom': r(nextBotR[0], nextBotR[1]) + 'px',
			'margin-left': -(r(nextSizeWR[0], nextSizeWR[1]) / 2) + 'px',
		});
		$text.css({
			'font-size': r(textFSR[0], textFSR[1]) + 'px',
			'line-height': r(textLHR[0], textLHR[1]) + 'px',
			'bottom': r(textBR[0], textBR[1]) + 'px',
		});

		var fullH = $slide.height() + $header.height() + $footer.height();
		if ($w.height() > fullH) {
			var t = ($w.height() - fullH) / 2;
			$slide.css('margin-top', (t) + 'px');
		}
	}).trigger('resize' + bindSuffix); // }}}1

	// bg video {{{1
	$('.bg_video').each(function () {
		var $bgVideo = $(this);
		var $video = $bgVideo.find('video');

		var waitForVideo = $.proxy(setTimeout, null, function () {
			if ($video.width() < 10 || $video.height() < 10) {
				waitForVideo();
				return;
			}

			var bindSuffix = '.main_page_bg_video';
			var sw = $video.width();
			var sh = $video.height();

			$w.on('resize' + bindSuffix, function () {
				var ww = $w.width();
				var wh = $w.height();

				var nw = ww;
				var nh = Math.round(ww * sh / sw);
				var ox = 0;
				var oy = (nh - wh) / 2;

				if (nh < wh) {
					nh = wh;
					nw = Math.round(wh * sw / sh);
					ox = (nw - ww) / 2;
					oy = 0;
				}

				$video.css({
					width: nw + 'px',
					height: nh + 'px',
					'margin-left': (-ox) + 'px',
					'margin-top': (-oy) + 'px',
				});

				$bgVideo.addClass('active');
			}).trigger('resize' + bindSuffix);
		}, getVal('waiterTimeout'));
		waitForVideo();
	});
	// bg video }}}1

}); // stylesReady()
}); // domReady()
}); // define()
