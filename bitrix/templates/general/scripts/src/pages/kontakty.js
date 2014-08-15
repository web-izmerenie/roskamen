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

	$s.each(function (i1) {
		var $s = $(this);
		var $imap = $s.find('.imap'); // interactive map
		var $maps = $imap.find('.map');

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

							$map.data('map', map);
							$w.trigger('resize' + imapResizeBindSuffix);

						});
					}
				); // dynamicLoadApi()
			}); // require(['dynamic_api']...
		}); // $maps.each

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
	}); // $s.each

}); // stylesReady()
}); // domReady()
}); // define()
