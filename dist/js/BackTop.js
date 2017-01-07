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

	__webpack_require__(5);

	(function ($, window, document, undefined) {
		var _backTop = void 0;

		(_backTop = function _backTop(classname) {
			if (!$(classname).length) return;
			var _isTop = void 0,
			    $win = $(window),
			    $target = $(classname);

			$(document).on('click', classname, function () {
				$('html, body').animate({ scrollTop: 0 });
			});

			(_isTop = function _isTop() {
				$target[$win.scrollTop() ? 'addClass' : 'removeClass']('show');
			})();

			$win.on('scroll', _isTop);
		})('.J-x-backtop');

		$.backTop = _backTop;
	})(jQuery, window, document); /*!
	                               * back top
	                               * xiewulong <xiewulong@vip.qq.com>
	                               * create: 2015/1/13
	                               * version: 0.0.1
	                               */

	// styles

/***/ },

/***/ 5:
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ }

/******/ });