/**
 * Localization values
 *
 * @author Viacheslav Lotsmanov
 * @encoding utf-8
 * @license GNU/AGPLv3
 * @see {@link https://github.com/web-izmerenie/roskamen/blob/master/LICENSE-AGPLv3|License}
 */

define(['get_val'], function (getVal) {

	var locals = {

		'ru': {

			'ERR': {
				'AJAX': 'Произошла ошибка динамической загрузки данных.',
				'AJAX_PARSE': 'Произошла ошибка обработки динамически загруженных данных.',

				'MAP_DATA_NOT_FOUND': 'Недостаточно данных для построения карты.',
			},

		},

		'defaultLocal': getVal('lang')

	};

	return locals;

}); // define()
