/*!
 * back top
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2015/1/13
 * version: 0.0.1
 */

(function($, window, document, undefined){
	var _backTop;

	(_backTop = function(classname){
		if(!$(classname).length)return;
		var _isTop,
			$win	= $(window),
			$target = $(classname);

		$(document).on('click', classname, function(){
			$('html, body').animate({scrollTop: 0});
		});

		(_isTop = function(){
			$target[$win.scrollTop() ? 'addClass' : 'removeClass']('show');
		})();

		$win.on('scroll', _isTop);
	})('.J-x-backtop');

	$.backTop = _backTop;
})(jQuery, window, document);