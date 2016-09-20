'use strict';

/*!
 * top tips
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2015/1/15
 * version: 0.0.1
 */

(function ($, window, undefined) {
	var _run = void 0,
	    types = {
		success: 'x-tips-success',
		error: 'x-tips-error'
	};

	(_run = function _run() {
		var delay = arguments.length <= 0 || arguments[0] === undefined ? 2000 : arguments[0];

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
		var classname = arguments.length <= 2 || arguments[2] === undefined ? '' : arguments[2];
		var delay = arguments[3];

		if (type = types[type]) {
			$('body').append('<div class="x-tips J-x-tips ' + type + ' ' + classname + '"><p>' + message + '</p></div>');
			_run(delay);
		}
	}

	$.tips = _tips;
})(jQuery, window);
//# sourceMappingURL=TopTips.js.map
