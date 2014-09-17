/**
 * Main module
 *
 * @author Viacheslav Lotsmanov
 */

define(['basics/get_val'], function (getVal) {

	var aliasMap = {
		'modernizr': 'libs/modernizr.custom.01922',

		// basics
		'get_local_text': 'basics/get_local_text',
		'get_val': 'basics/get_val',
		'relative_number': 'basics/relative_number',
		'dynamic_api': 'basics/dynamic_api',
	};

	var paths = {};

	if (getVal('clientSide')) {
		paths.jquery = 'libs/jquery-2.1.1';
		paths['jquery.easing'] = 'libs/jquery.easing-1.3';
	}

	require.config({
		map: { '*': aliasMap },
		paths: paths,
		enforceDefine: true,
	}); // require.config()

	require(['jquery', 'modernizr', 'jquery.easing'], function ($) {
		$(function domReady() {
			var $html = $('html');

			if ($html.hasClass('main_page')) require(['pages/main']);
			if ($('section.contacts').size() > 0) require(['pages/kontakty']);
			if ($('section.pit').size() > 0) require(['pages/karier']);

			if (
				$('section.production').size() > 0 ||
				$('section.production_detail').size() > 0)
			{
				require(['pages/produktsiya']);
			}
			if ($html.hasClass('error_404')) require(['pages/error_404']);

			require(['header']);
		}); // domReady()
	});

}); // define()
