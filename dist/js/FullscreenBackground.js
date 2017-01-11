/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/*!**************************************************************!*\
  !*** ./vendor/xiewulong/yii2-xui/js/FullscreenBackground.js ***!
  \**************************************************************/
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	__webpack_require__(/*! ../scss/FullscreenBackground.scss */ 3);
	
	(function ($, undefined) {
	
		if (!$('.J-x-fullscreen-bg').length) return;
	
		var $img = void 0,
		    len = void 0,
		    $bg = $('.J-x-fullscreen-bg'),
		    path = $bg.attr('data-path') || '',
		    imgs = $bg.attr('data-images'),
		    loaded = 0,
		    timer = null,
		    index = 0,
		    speed = 8000;
	
		imgs = $.trim(imgs) ? imgs.split('|') : [];
		len = imgs.length;
	
		if (!len) return;
	
		$.each(imgs, function (i) {
			var img = new Image();
			img.onload = function () {
				loaded++;
				loaded == len && _go();
			};
			img.src = _src(this);
		});
	
		function _go() {
			var j = loaded % len;
			!$img && ($img = $('<img />').appendTo($bg));
			$img.stop(true, true).animate({ opacity: 0 }, function () {
				$(this).attr('src', _src(imgs[j])).stop(true, true).animate({ opacity: 1 });
			});
			loaded = j;
			len > 1 && (loaded++, timer = setTimeout(_go, speed));
		}
	
		function _src(name) {
			return (path ? path + '/' : '') + name;
		}
	})(jQuery); /*!
	             * fullscreen background
	             * xiewulong <xiewulong@vip.qq.com>
	             * create: 2015/1/13
	             * version: 0.0.1
	             */
	
	// styles

/***/ },
/* 1 */,
/* 2 */,
/* 3 */
/*!******************************************************************!*\
  !*** ./vendor/xiewulong/yii2-xui/scss/FullscreenBackground.scss ***!
  \******************************************************************/
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ }
/******/ ]);
//# sourceMappingURL=FullscreenBackground.js.map