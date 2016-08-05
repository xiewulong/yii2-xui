/*!
 * top tips
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2015/1/15
 * version: 0.0.1
 */

(function($, window, undefined) {
	var _run,
		types = {
			success : 'x-tips-success',
			error : 'x-tips-error'
		};
	(_run = function(delay) {
		var _show,
			$tips	= $('.J-x-tips'),
			len		= $tips.length,
			index	= 0,
			delay	= delay || 2000;
		(_show = function(i) {
			var $tip = $tips.eq(i);
			if(!$tip) return;
			$tip.stop(true, true).fadeIn(function() {
				$tip.delay(delay).fadeOut(function() {
					$tip.remove();
					_show(i + 1);
				});
			});
		})(index);
	})();
	function _tips(type, message, classname, delay) {
		if(type = types[type]) {
			$('body').append('<div class="x-tips J-x-tips ' + type + ' ' + (classname || '') + '"><p>' + message + '</p></div>');
			_run(delay);
		}
	}
	$.tips = _tips;
})(jQuery, window);
