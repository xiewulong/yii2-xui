/*!
 * admin
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2016/8/2
 * version: 0.0.2
 */

// csrf
(function($, document, undefined) {
	var param	= $('meta[name=csrf-param]').attr('content'),
		token	= $('meta[name=csrf-token]').attr('content');
	$.csrf = function(data) {
		data = data || {};
		data[param] = token;
		return data;
	};
})(jQuery, document);

// modal
(function($, document, undefined) {
	$.modal = function(html, options) {
		// html sample
		// '<div class="modal fade">' +
		// 	'<div class="modal-dialog">' +
		// 		'<div class="modal-content">' +
		// 			'<div class="modal-header">' +
		// 				'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		// 				'<h4 class="modal-title">Modal title</h4>' +
		// 			'</div>' +
		// 			'<div class="modal-body">' +
		// 				'<p>One fine body&hellip;</p>' +
		// 			'</div>' +
		// 			'<div class="modal-footer">' +
		// 				'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
		// 				'<button type="button" class="btn btn-primary">Save changes</button>' +
		// 			'</div>' +
		// 		'</div>' +
		// 	'</div>' +
		// '</div>';

		return $(html).modal($.extend({backdrop: 'static'}, options)).on('shown.bs.modal', function() {
			$(this).find('[autofocus=autofocus]').focus();
		}).on('hidden.bs.modal', function() {
			$(this).remove();
		});
	};
})(jQuery, document);

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

// alert
(function($, document, undefined) {
	var $alerts	= $('.J-admin-alerts'),
		types	= ['success', 'danger', 'info', 'warning'],
		Alert	= function(text, type, delay) {
			this.text = text;
			this.type = types[type];
			this.delay = delay || 3000;
			return this.init();
		};
	Alert.prototype = {
		init: function() {
			this.render();
			this.delayClose();
			return this.$alert;
		},
		render: function() {
			var _this	= this;
			this.$alert = $(	'<div class="alert alert-' + this.type + ' alert-dismissible">' +
									'<button type="button" class="close"><span>&times;</span></button>' +
									this.text +
								'</div>').appendTo($alerts)
			.on('click', '.close', function() {
				_this.close();
			}).on('webkitTransitionend transitionend', function() {
				!_this.$alert.hasClass('alert-show') && _this.remove();
			});
			setTimeout(function() {
				_this.$alert.addClass('alert-show');
			}, 0);
		},
		delayClose: function() {
			var _this	= this;
			this.timer = setTimeout(function() {
				_this.close();
			}, this.delay);
		},
		close: function() {
			clearTimeout(this.timer);
			this.$alert.removeClass('alert-show');
		},
		remove: function() {
			this.$alert.remove();
		},
	};
	$.alert = function(text, type, delay) {
		if(type === undefined || type === true) {
			type = 1;
		} else if(type === false) {
			type = 0;
		}
		return new Alert(text, type, delay);
	}
})(jQuery, document);

// delete modal
(function($, document, undefined) {
	$(document).on('click', '[data-delete]', function() {
		var deleted, $modal,
			$this	= $(this),
			id		= $this.attr('data-delete'),
			url		= $this.attr('href') || $this.attr('data-url');
		if(!id || !url) return;
		$modal = $.modal(	'<div class="modal fade">' +
								'<div class="modal-dialog">' +
									'<form class="modal-content">' +
										'<fieldsed>' +
											'<div class="modal-header">' +
												'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
												'<h5 class="modal-title">删除提示</h5>' +
											'</div>' +
											'<div class="modal-body">' +
												'<p>您确定要删除吗？</p>' +
											'</div>' +
											'<div class="modal-footer">' +
												'<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>' +
												'<button type="submit" class="btn btn-primary">确定</button>' +
											'</div>' +
										'</fieldsed>' +
									'</form>' +
								'</div>' +
							'</div>');
		$modal.on('submit', 'form', function() {
			var $fieldset	= $(this).find('fieldset').prop('disabled', true);
			$.ajax({
				url: url,
				data: $.csrf({id: id}),
				method: 'post',
				dataType: 'json',
				success: function(d) {
					if(!d.error) {
						deleted = true;
					}
					$modal.modal('hide');
					$.alert(d.message, d.error);
				}
			});
			return false;
		}).on('hidden.bs.modal', function() {
			deleted && window.location.reload();
		});
		return false;
	});
})(jQuery, document);

// attachment upload
(function($, document, undefined) {
	$(document).on('uploaded.attachment.file', '.J-admin-attachment input[type=file]', function(e, d) {
		if(d.error) {
			$.alert(d.message);
			return false;
		}
		$(this).parent().attr('data-attachment-max') === undefined ? _setData.call(this, d.data) : _new.call(this, d.data);
		$.alert(d.message, d.error);
	}).on('click', '.J-admin-attachment i', function() {
		var $add, max,
			$parent	= $(this).parent();
		if($parent.hasClass('admin-attachments')) {
			$add = $parent.siblings('[data-attachment-max]');
			max = + $add.attr('data-attachment-max');
			max > 0 && $parent.siblings('.admin-attachments').length < max && $add.show();
			$parent.remove();
			return false;
		}
		$parent.find('input[type=hidden]').val('');
		$parent.find('img, i').remove();
	}).on('click', '[data-attachment-max]', function() {
		var $this	= $(this),
			max		= + $this.attr('data-attachment-max');
		if(max > 0 && $this.prevAll('.admin-attachments').length >= max) {
			$.alert('最多只能添加' + max + '张图片', 3);
			return false;
		}
	});
	$('.J-admin-attachment').each(function() {
		var $this	= $(this),
			$hidden	= $this.find('input[type=hidden]'),
			$file	= $this.find('input[type=file]'),
			data	= {'id': $hidden.val()};
		data && _setData.call($file.get(0), data);
	});
	function _new(data) {
		var $this	= $(this),
			$parent	= $this.parent(),
			max		= + $parent.attr('data-attachment-max');
			$new 	= $parent.clone().removeAttr('data-attachment-max').removeClass('glyphicon-plus').addClass('glyphicon-picture admin-attachments');
		_setData.call($new.find('input[type=file]').get(0), data, true);
		$parent.before($new);
		max > 0 && $parent.siblings('.admin-attachments').length >= max && $parent.hide();
	}
	function _setData(data, isNew) {
		var $this		= $(this),
			$parent		= $this.parent(),
			$hidden		= $parent.find('input[type=hidden]'),
			$img		= $parent.find('img');
		if(!$hidden.length) {
			$hidden = $('<input type="hidden" name="' + $this.attr('data-attachment-upload') + '" />').appendTo($parent);
		}
		if(!$img.length) {
			$img = $('<img />').appendTo($parent);
		}
		if(!$parent.find('i').length) {
			$parent.append('<i class="glyphicon glyphicon-remove"></i>');
		}
		$hidden.val(data.id);
		$img.attr('src', $this.attr('data-attachment-load-action') + '?id=' + data.id);
		isNew && $this.remove();
	}
})(jQuery, document);
