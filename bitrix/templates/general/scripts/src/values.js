/**
 * Values for "get_val" module
 *
 * @author Viacheslav Lotsmanov
 */

define(function () {

	/** @public */ var exports = {};

	exports.values = {

		animationSpeed: 200, // ms
		animationCurve: 'easeInOutQuad', // easing
		footerHeight: 100, // px
		waiterTimeout: 200, // ms
		dynamicApiLoadInterval: 300, // ms

		headerHeightRange: [96, 103], // [px, px]
		headerSiteNameFSRange: [26, 35], // [px, px]
		headerFSRange: [18, 24],

		kontaktyMapRatio: [980, 450], // ratio a:b

	};

	exports.values.mainMargin = 38; // px
	exports.values.minWidth = 980; // px
	exports.values.maxWidth = 1138 + (exports.values.mainMargin * 2); // px

	/** Required set before "getVal" */
	exports.required = [
		'clientSide',
		'lang',
		'revision',
		'tplPath',
	];

	return exports;

}); // define()
