/**
 * "kontakty" page behavior
 *
 * @author Viacheslav Lotsmanov
 * @license GNU/AGPLv3
 * @see {@link https://github.com/web-izmerenie/roskamen/blob/master/LICENSE-AGPLv3|License}
 */

define(['jquery', 'styles_ready', 'get_val', 'get_local_text'],
function ($, stylesReady, getVal, getLocalText) {
$(function domReady() {
var $s = $('section.contacts');
if ($s.size() <= 0) return;

var $html = $('html');
var $body = $('body');
var $w = $(window);
var $d = $(document);
var $header = $('header');
var $page = $('html,body');

var imapResizeBindSuffix = '.interactive_map_resize';
var imapRatio = getVal('kontaktyMapRatio');

stylesReady(function () {

	$s.each(function (i1) {
		var $s = $(this);
		var $imap = $s.find('.imap'); // interactive map
		var $maps = $imap.find('.map');

		// map logic {{{1
		$maps.each(function (i2) {
			var $map = $(this);
			var id = 'interactive_yandex_map_n_'+ i1 +'_'+ i2;
			$map.attr('id', id);

			require(['dynamic_api'], function (dynamicLoadApi) {
				var mapLang = (getVal('lang') === 'ru') ? 'ru-RU' : 'en-US';
				dynamicLoadApi(
					'http://api-maps.yandex.ru/2.0/?load=package.standard&lang='+mapLang,
					'ymaps',
					function (err, ymaps) {
						if (err) throw err;
						ymaps.ready(function () {

							var x = parseFloat($map.attr('data-coord-x'));
							var y = parseFloat($map.attr('data-coord-y'));

							var map = new ymaps.Map(id, {
								center: [ y, x ],
								zoom: parseInt($map.attr('data-zoom'), 10),
								type: 'yandex#publicMapHybrid',
							});

							map.controls
								.add('zoomControl', { left: 15, top: 15 })
								.add('typeSelector', { right: 15, top: 15 });

							function handler() {
								map.setCenter([y, x]);
								return false;
							}

							map.events.add('click', handler);
							map.events.add('mousedown', handler);
							map.events.add('mouseup', handler);
							map.events.add('mousemove', handler);
							map.events.add('mousestart', handler);
							map.events.add('mouseleave', handler);
							map.events.add('touchstart', handler);
							map.events.add('touchleave', handler);

							$map.data('map', map);
							$w.trigger('resize' + imapResizeBindSuffix);

						});
					}
				); // dynamicLoadApi()
			}); // require(['dynamic_api']...
		}); // $maps.each
		// map logic }}}1

		// resize map {{{1
		$w.on(
			'resize' + imapResizeBindSuffix,
			$.proxy(setTimeout, null, function () {
				$imap.css(
					'height',
					$imap.width() * imapRatio[1] / imapRatio[0] + 'px'
				);

				$maps.each(function () {
					var map = $(this).data('map');
					if (map) map.container.fitToViewport();
				});
			}, 1)
		).trigger('resize' + imapResizeBindSuffix);
		// resize map }}}1

		// popup map links {{{1
		$s.find('a.popup-map').each(function (i) {
			$(this).click(function () {
				if ($html.hasClass('popup-map'))
					return false;
				else
					$html.addClass('popup-map');

				var $link = $(this);

				var x = $link.attr('data-coord-x');
				var y = $link.attr('data-coord-y');
				var zoom = $link.attr('data-zoom');

				var bindSuffix = '.popup_yandex_map';

				if (!x || !y || !zoom) {
					alert(getLocalText('ERR', 'MAP_DATA_NOT_FOUND'));
					return false;
				}

				x = parseFloat(x);
				y = parseFloat(y);
				zoom = parseInt(zoom, 10);

				var $popup = $('<div/>', { class: 'popup-map' });
				var $overflow = $('<div/>', { class: 'overflow' });
				var $content = $('<div/>', { class: 'content' });

				var $closer = $('<a/>', { class: 'closer' });
				var $map = $('<div/>', { class: 'map' });

				$content.append($map).append($closer);
				$popup.append($overflow).append($content);

				var id = 'interactive_yandex_popup_map';
				$map.attr('id', id);

				$body.append($popup);

				function close() {
					if ($html.hasClass('popup-map-closing'))
						return false;
					else
						$html.addClass('popup-map-closing');

					$w.off('resize' + bindSuffix);
					$d.off('click' + bindSuffix);

					$popup.stop().animate(
						{ opacity: 0 },
						getVal('animationSpeed'),
						getVal('animationCurve'), function () {
							$map.remove();
							$closer.remove();
							$content.remove();
							$overflow.remove();
							$popup.remove();
							$html
								.removeClass('popup-map-closing')
								.removeClass('popup-map');
						});

					return false;
				}

				// init map {{{2
				require(['dynamic_api'], function (dynamicLoadApi) {
					var mapLang = (getVal('lang') === 'ru') ? 'ru-RU' : 'en-US';
					dynamicLoadApi(
						'http://api-maps.yandex.ru/2.0/?load=package.standard&lang='+mapLang,
						'ymaps',
						function (err, ymaps) {
							if (err) throw err;
							ymaps.ready(function () {

								var map = new ymaps.Map(id, {
									center: [ y, x ],
									zoom: zoom,
								});

								map.controls
									.add('zoomControl', { left: 15, top: 15 })
									.add('typeSelector', { left: 15, bottom: 15 });

								var mark = new ymaps.Placemark([y, x], {
									hintContent: $link.attr('data-address'),
								});

								map.geoObjects.add(mark);

								$map.data('map', map);

								$w.on('resize' + bindSuffix, function () {
									map.container.fitToViewport();
								});

								$w.trigger('resize');

								$closer.click(close);

								// close by click out of map area {{{3
								$d.on('click' + bindSuffix, function (event) {
									var x = $content.offset().left;
									var y = $content.offset().top;
									var w = $content.innerWidth();
									var h = $content.innerHeight();

									// hell IE
									if (event.pageX < 0 || event.pageY < 0) return true;

									if (
										!(event.pageX >= x && event.pageX <= x+w) ||
										!(event.pageY >= y && event.pageY <= y+h)
									) {
										$closer.trigger('click');
										return false;
									}

									return true;
								});
								// close by click out of map area }}}3

							});
						});
				});
				// init map }}}2

				$popup.stop().css('opacity', 0).animate(
					{ opacity: 1 },
					getVal('animationSpeed'),
					getVal('animationCurve'));

				return false;
			});
		});
		// popup map links }}}1
	}); // $s.each

}); // stylesReady()
}); // domReady()
}); // define()
