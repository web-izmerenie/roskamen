/**
 * main page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'styles_ready', 'get_val'],
function ($, stylesReady, getVal) {
$(function domReady() {
var $html = $('html');
if (!$html.hasClass('main_page')) return;

var $w = $(window);
var $header = $('header');
var $footer = $('footer');

var bindSuffix = '.main_page';

stylesReady(function () {

	var $slides = $('ul.slides li');
	var $slide = $('.slide');
	var $next = $slide.find('.next');
	var $bg = $slide.find('.bg');
	var $text = $slide.find('.text');
	var $tInside = $text.find('.inside');

	var cur = 0;
	var animate = false;

	function slideGo() {
		if (animate) return false; else animate = true;

		cur++;
		var $target = $slides.eq(cur);

		if ($target.size() <= 0) {
			cur = 0;
			$target = $slides.eq(cur);
		}

		applySlide($target);

		return false;
	}

	function applySlide($target) {
		$slide.css('border-color', $target.attr('data-color'));
		$text.animate(
			{ opacity: 0 },
			getVal('animationSpeed'),
			getVal('animationCurve'),
			function () {
				$tInside.html( $target.find('h3').html() );
				$text.animate(
					{ opacity: 1 },
					getVal('animationSpeed') * 4,
					getVal('animationCurve')
				);
			}
		);
		$bg.animate(
			{ opacity: 0 },
			getVal('animationSpeed'),
			getVal('animationCurve'),
			function () {
				$bg.html('<img alt="" src="'+ $target.find('img').attr('src') +'">');
				$bg.animate(
					{ opacity: 1 },
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
	}

	applySlide($slides.eq(cur));

	$next.on('click', slideGo);

	$w.on('resize' + bindSuffix, function () {
		$slide.css('margin-top', '');
		var fullH = $slide.height() + $header.height() + $footer.height();
		if ($w.height() > fullH) {
			var t = ($w.height() - fullH) / 2;
			$slide.css('margin-top', (t) + 'px');
		}
	}).trigger('resize' + bindSuffix);

}); // stylesReady()
}); // domReady()
}); // define()
