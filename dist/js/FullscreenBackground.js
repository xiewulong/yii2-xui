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
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	eval("'use strict';\n\n__webpack_require__(3);\n\n(function ($, undefined) {\n\n\tif (!$('.J-x-fullscreen-bg').length) return;\n\n\tvar $img = void 0,\n\t    len = void 0,\n\t    $bg = $('.J-x-fullscreen-bg'),\n\t    path = $bg.attr('data-path') || '',\n\t    imgs = $bg.attr('data-images'),\n\t    loaded = 0,\n\t    timer = null,\n\t    index = 0,\n\t    speed = 8000;\n\n\timgs = $.trim(imgs) ? imgs.split('|') : [];\n\tlen = imgs.length;\n\n\tif (!len) return;\n\n\t$.each(imgs, function (i) {\n\t\tvar img = new Image();\n\t\timg.onload = function () {\n\t\t\tloaded++;\n\t\t\tloaded == len && _go();\n\t\t};\n\t\timg.src = _src(this);\n\t});\n\n\tfunction _go() {\n\t\tvar j = loaded % len;\n\t\t!$img && ($img = $('<img />').appendTo($bg));\n\t\t$img.stop(true, true).animate({ opacity: 0 }, function () {\n\t\t\t$(this).attr('src', _src(imgs[j])).stop(true, true).animate({ opacity: 1 });\n\t\t});\n\t\tloaded = j;\n\t\tlen > 1 && (loaded++, timer = setTimeout(_go, speed));\n\t}\n\n\tfunction _src(name) {\n\t\treturn (path ? path + '/' : '') + name;\n\t}\n})(jQuery); /*!\n             * fullscreen background\n             * xiewulong <xiewulong@vip.qq.com>\n             * create: 2015/1/13\n             * version: 0.0.1\n             */\n\n// styles\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi92ZW5kb3IveGlld3Vsb25nL3lpaTIteHVpL2pzL0Z1bGxzY3JlZW5CYWNrZ3JvdW5kLmpzP2VlMjMiXSwibmFtZXMiOlsiJCIsInVuZGVmaW5lZCIsImxlbmd0aCIsIiRpbWciLCJsZW4iLCIkYmciLCJwYXRoIiwiYXR0ciIsImltZ3MiLCJsb2FkZWQiLCJ0aW1lciIsImluZGV4Iiwic3BlZWQiLCJ0cmltIiwic3BsaXQiLCJlYWNoIiwiaSIsImltZyIsIkltYWdlIiwib25sb2FkIiwiX2dvIiwic3JjIiwiX3NyYyIsImoiLCJhcHBlbmRUbyIsInN0b3AiLCJhbmltYXRlIiwib3BhY2l0eSIsInNldFRpbWVvdXQiLCJuYW1lIiwialF1ZXJ5Il0sIm1hcHBpbmdzIjoiOztBQVFBOztBQUVBLENBQUMsVUFBQ0EsQ0FBRCxFQUFJQyxTQUFKLEVBQWtCOztBQUVsQixLQUFHLENBQUNELEVBQUUsb0JBQUYsRUFBd0JFLE1BQTVCLEVBQW9DOztBQUVwQyxLQUFJQyxhQUFKO0FBQUEsS0FBVUMsWUFBVjtBQUFBLEtBQ0NDLE1BQU9MLEVBQUUsb0JBQUYsQ0FEUjtBQUFBLEtBRUNNLE9BQU9ELElBQUlFLElBQUosQ0FBUyxXQUFULEtBQXlCLEVBRmpDO0FBQUEsS0FHQ0MsT0FBT0gsSUFBSUUsSUFBSixDQUFTLGFBQVQsQ0FIUjtBQUFBLEtBSUNFLFNBQVMsQ0FKVjtBQUFBLEtBS0NDLFFBQVEsSUFMVDtBQUFBLEtBTUNDLFFBQVEsQ0FOVDtBQUFBLEtBT0NDLFFBQVEsSUFQVDs7QUFTQUosUUFBT1IsRUFBRWEsSUFBRixDQUFPTCxJQUFQLElBQWVBLEtBQUtNLEtBQUwsQ0FBVyxHQUFYLENBQWYsR0FBaUMsRUFBeEM7QUFDQVYsT0FBTUksS0FBS04sTUFBWDs7QUFFQSxLQUFHLENBQUNFLEdBQUosRUFBUzs7QUFFVEosR0FBRWUsSUFBRixDQUFPUCxJQUFQLEVBQWEsVUFBU1EsQ0FBVCxFQUFZO0FBQ3hCLE1BQUlDLE1BQU0sSUFBSUMsS0FBSixFQUFWO0FBQ0FELE1BQUlFLE1BQUosR0FBYSxZQUFXO0FBQ3ZCVjtBQUNBQSxhQUFVTCxHQUFWLElBQWlCZ0IsS0FBakI7QUFDQSxHQUhEO0FBSUFILE1BQUlJLEdBQUosR0FBVUMsS0FBSyxJQUFMLENBQVY7QUFDQSxFQVBEOztBQVNBLFVBQVNGLEdBQVQsR0FBZTtBQUNkLE1BQUlHLElBQUlkLFNBQVNMLEdBQWpCO0FBQ0EsR0FBQ0QsSUFBRCxLQUFVQSxPQUFPSCxFQUFFLFNBQUYsRUFBYXdCLFFBQWIsQ0FBc0JuQixHQUF0QixDQUFqQjtBQUNBRixPQUFLc0IsSUFBTCxDQUFVLElBQVYsRUFBZ0IsSUFBaEIsRUFBc0JDLE9BQXRCLENBQThCLEVBQUNDLFNBQVMsQ0FBVixFQUE5QixFQUE0QyxZQUFXO0FBQ3REM0IsS0FBRSxJQUFGLEVBQVFPLElBQVIsQ0FBYSxLQUFiLEVBQW9CZSxLQUFLZCxLQUFLZSxDQUFMLENBQUwsQ0FBcEIsRUFBbUNFLElBQW5DLENBQXdDLElBQXhDLEVBQThDLElBQTlDLEVBQW9EQyxPQUFwRCxDQUE0RCxFQUFDQyxTQUFTLENBQVYsRUFBNUQ7QUFDQSxHQUZEO0FBR0FsQixXQUFTYyxDQUFUO0FBQ0FuQixRQUFNLENBQU4sS0FBWUssVUFBVUMsUUFBUWtCLFdBQVdSLEdBQVgsRUFBZ0JSLEtBQWhCLENBQTlCO0FBQ0E7O0FBRUQsVUFBU1UsSUFBVCxDQUFjTyxJQUFkLEVBQW9CO0FBQ25CLFNBQU8sQ0FBQ3ZCLE9BQU9BLE9BQU8sR0FBZCxHQUFvQixFQUFyQixJQUEyQnVCLElBQWxDO0FBQ0E7QUFFRCxDQXpDRCxFQXlDR0MsTUF6Q0gsRSxDQVZBOzs7Ozs7O0FBT0EiLCJmaWxlIjoiMC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qIVxuICogZnVsbHNjcmVlbiBiYWNrZ3JvdW5kXG4gKiB4aWV3dWxvbmcgPHhpZXd1bG9uZ0B2aXAucXEuY29tPlxuICogY3JlYXRlOiAyMDE1LzEvMTNcbiAqIHZlcnNpb246IDAuMC4xXG4gKi9cblxuLy8gc3R5bGVzXG5pbXBvcnQgJy4uL3Njc3MvRnVsbHNjcmVlbkJhY2tncm91bmQuc2Nzcyc7XG5cbigoJCwgdW5kZWZpbmVkKSA9PiB7XG5cblx0aWYoISQoJy5KLXgtZnVsbHNjcmVlbi1iZycpLmxlbmd0aCkgcmV0dXJuO1xuXG5cdGxldCAkaW1nLCBsZW4sXG5cdFx0JGJnXHRcdD0gJCgnLkoteC1mdWxsc2NyZWVuLWJnJyksXG5cdFx0cGF0aFx0PSAkYmcuYXR0cignZGF0YS1wYXRoJykgfHwgJycsXG5cdFx0aW1nc1x0PSAkYmcuYXR0cignZGF0YS1pbWFnZXMnKSxcblx0XHRsb2FkZWRcdD0gMCxcblx0XHR0aW1lclx0PSBudWxsLFxuXHRcdGluZGV4XHQ9IDAsXG5cdFx0c3BlZWRcdD0gODAwMDtcblxuXHRpbWdzID0gJC50cmltKGltZ3MpID8gaW1ncy5zcGxpdCgnfCcpIDogW107XG5cdGxlbiA9IGltZ3MubGVuZ3RoO1xuXG5cdGlmKCFsZW4pIHJldHVybjtcblxuXHQkLmVhY2goaW1ncywgZnVuY3Rpb24oaSkge1xuXHRcdGxldCBpbWdcdD0gbmV3IEltYWdlKCk7XG5cdFx0aW1nLm9ubG9hZCA9IGZ1bmN0aW9uKCkge1xuXHRcdFx0bG9hZGVkKys7XG5cdFx0XHRsb2FkZWQgPT0gbGVuICYmIF9nbygpO1xuXHRcdH07XG5cdFx0aW1nLnNyYyA9IF9zcmModGhpcyk7XG5cdH0pO1xuXG5cdGZ1bmN0aW9uIF9nbygpIHtcblx0XHRsZXQgaiA9IGxvYWRlZCAlIGxlbjtcblx0XHQhJGltZyAmJiAoJGltZyA9ICQoJzxpbWcgLz4nKS5hcHBlbmRUbygkYmcpKTtcblx0XHQkaW1nLnN0b3AodHJ1ZSwgdHJ1ZSkuYW5pbWF0ZSh7b3BhY2l0eTogMH0sIGZ1bmN0aW9uKCkge1xuXHRcdFx0JCh0aGlzKS5hdHRyKCdzcmMnLCBfc3JjKGltZ3Nbal0pKS5zdG9wKHRydWUsIHRydWUpLmFuaW1hdGUoe29wYWNpdHk6IDF9KTtcblx0XHR9KTtcblx0XHRsb2FkZWQgPSBqO1xuXHRcdGxlbiA+IDEgJiYgKGxvYWRlZCsrLCB0aW1lciA9IHNldFRpbWVvdXQoX2dvLCBzcGVlZCkpO1xuXHR9XG5cblx0ZnVuY3Rpb24gX3NyYyhuYW1lKSB7XG5cdFx0cmV0dXJuIChwYXRoID8gcGF0aCArICcvJyA6ICcnKSArIG5hbWU7XG5cdH1cblxufSkoalF1ZXJ5KTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3ZlbmRvci94aWV3dWxvbmcveWlpMi14dWkvanMvRnVsbHNjcmVlbkJhY2tncm91bmQuanMiXSwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 1 */,
/* 2 */,
/* 3 */
/***/ function(module, exports) {

	eval("// removed by extract-text-webpack-plugin\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi92ZW5kb3IveGlld3Vsb25nL3lpaTIteHVpL3Njc3MvRnVsbHNjcmVlbkJhY2tncm91bmQuc2Nzcz80ZmQzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6IjMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vdmVuZG9yL3hpZXd1bG9uZy95aWkyLXh1aS9zY3NzL0Z1bGxzY3JlZW5CYWNrZ3JvdW5kLnNjc3Ncbi8vIG1vZHVsZSBpZCA9IDNcbi8vIG1vZHVsZSBjaHVua3MgPSAxIl0sInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);