/*!
 * admin
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2016/8/2
 * version: 0.0.2
 */

// dropdown
(function($, document, undefined) {
	$(document).on('click', '.J-admin-header .menu > ul.main > li > .text', function() {
		var $li	= $(this).parent('li');
		if(!$li.hasClass('dropdown-hover') && $li.find('ul.dropdown, ul.dropdown-mixed').length) {
			$li.toggleClass('dropdown-open');
			return false;
		}
	}).on('click', function() {
		$('.J-admin-header .menu > ul.main > li.dropdown-open').removeClass('dropdown-open');
	});
})(jQuery, document);

// sidebar
(function($, document, undefined) {
	$(document).on('click', '.J-admin-sidebar .sidebar-control', function() {
		$(this).parents('.J-admin-sidebar').toggleClass('admin-sidebar-fold');
	}).on('click', '.J-admin-sidebar ul.sidebar > li > .text', function() {
		var $li		= $(this).parent('li'),
			$child	= $li.children('ul.children');
		if($child.length) {
			$li.toggleClass('fold');
		}
	});
	$('.J-admin-sidebar ul.sidebar > li > ul.children').each(function() {
		var $this = $(this);
		$this.height($this.height());
	});
})(jQuery, document);
