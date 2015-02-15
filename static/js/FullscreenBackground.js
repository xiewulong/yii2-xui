/*!
 * fullscreen background
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2015/1/13
 * version: 0.0.1
 */

(function($, undefined){
	if(!$('.J-x-fullscreen-bg').length)return;

	var $img, len,
		$bg		= $('.J-x-fullscreen-bg'),
		path	= $bg.attr('data-path') || '',
		imgs	= $bg.attr('data-images'),
		loaded	= 0,
		timer	= null,
		index	= 0,
		speed	= 8000;

	imgs = $.trim(imgs) ? imgs.split('|') : [];
	len = imgs.length;

	if(!len)return;

	$.each(imgs, function(i){
		var img	= new Image();
		img.onload = function(){
			loaded++;
			loaded == len && _go();
		};
		img.src = _src(this);
	});

	function _go(){
		var j = loaded % len;
		!$img && ($img = $('<img />').appendTo($bg));
		$img.stop(true, true).animate({opacity: 0}, function(){
			$(this).attr('src', _src(imgs[j])).stop(true, true).animate({opacity: 1});
		});
		loaded = j;
		len > 1 && (loaded++, timer = setTimeout(_go, speed));
	}

	function _src(name){
		return (path ? path + '/' : '') + name;
	}
})(jQuery);