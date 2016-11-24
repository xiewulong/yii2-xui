/*!
 * top tips
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2015/1/15
 * version: 0.0.1
 */

// styles
import '../scss/TopTips.scss';

(($, window, undefined) => {
	let _run,
		types = {
			success : 'x-tips-success',
			error : 'x-tips-error',
		};

	(_run = (delay = 2000) => {
		let _show,
			$tips	= $('.J-x-tips'),
			len		= $tips.length,
			index	= 0;

		(_show = (i) => {
			let $tip = $tips.eq(i);
			if(!$tip) return;
			$tip.stop(true, true).fadeIn(function() {
				$tip.delay(delay).fadeOut(function() {
					$tip.remove();
					_show(i + 1);
				});
			});
		})(index);
	})();

	function _tips(type, message, classname = '', delay) {
		if(type = types[type]) {
			$('body').append('<div class="x-tips J-x-tips ' + type + ' ' + classname + '"><p>' + message + '</p></div>');
			_run(delay);
		}
	}

	$.tips = _tips;
})(jQuery, window);
