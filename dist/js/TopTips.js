/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	__webpack_require__(9);

	(function ($, window, undefined) {
		var _run = void 0,
		    types = {
			success: 'x-tips-success',
			error: 'x-tips-error'
		};

		(_run = function _run() {
			var delay = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 2000;

			var _show2 = void 0,
			    $tips = $('.J-x-tips'),
			    len = $tips.length,
			    index = 0;

			(_show2 = function _show(i) {
				var $tip = $tips.eq(i);
				if (!$tip) return;
				$tip.stop(true, true).fadeIn(function () {
					$tip.delay(delay).fadeOut(function () {
						$tip.remove();
						_show2(i + 1);
					});
				});
			})(index);
		})();

		function _tips(type, message) {
			var classname = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
			var delay = arguments[3];

			if (type = types[type]) {
				$('body').append('<div class="x-tips J-x-tips ' + type + ' ' + classname + '"><p>' + message + '</p></div>');
				_run(delay);
			}
		}

		$.tips = _tips;
	})(jQuery, window); /*!
	                     * top tips
	                     * xiewulong <xiewulong@vip.qq.com>
	                     * create: 2015/1/15
	                     * version: 0.0.1
	                     */

	// styles

/***/ },

/***/ 9:
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ }

/******/ });