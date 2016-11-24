/*!
 * back top
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2015/1/13
 * version: 0.0.1
 */

// styles
import '../scss/BackTop.scss';

(($, window, document, undefined) => {
	let _backTop;

	(_backTop = (classname) => {
		if(!$(classname).length) return;
		let _isTop,
			$win	= $(window),
			$target = $(classname);

		$(document).on('click', classname, function() {
			$('html, body').animate({scrollTop: 0});
		});

		(_isTop = () => {
			$target[$win.scrollTop() ? 'addClass' : 'removeClass']('show');
		})();

		$win.on('scroll', _isTop);
	})('.J-x-backtop');

	$.backTop = _backTop;
})(jQuery, window, document);
