/*!
 * admin
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2016/8/2
 * version: 0.0.2
 */

// csrf
(($, document, undefined) => {
	let param	= $('meta[name=csrf-param]').attr('content'),
		token	= $('meta[name=csrf-token]').attr('content');

	$.csrf = (data) => {
		data = data || {};
		data[param] = token;

		return data;
	};

})(jQuery, document);

// modal
(($, document, undefined) => {

	$.modal = (html, options) => {
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
(($, document, undefined) => {

	$(document).on('click', '.J-admin-header .menu > ul.main > li > .text', function() {
		let $li	= $(this).parent('li');

		if(!$li.hasClass('dropdown-hover') && $li.find('ul.dropdown, ul.dropdown-mixed').length) {
			$li.toggleClass('dropdown-open');

			return false;
		}
	}).on('click', function() {
		$('.J-admin-header .menu > ul.main > li.dropdown-open').removeClass('dropdown-open');
	});

})(jQuery, document);

// sidebar
(($, document, undefined) => {

	$(document).on('click', '.J-admin-sidebar .sidebar-control', function() {
		$(this).parents('.J-admin-sidebar').toggleClass('admin-sidebar-fold');
	}).on('click', '.J-admin-sidebar ul.sidebar > li > .text', function() {
		let $li	= $(this).parent('li');

		$li.children('ul.children').length && $li.toggleClass('fold');
	});

	$('.J-admin-sidebar ul.sidebar > li > ul.children').each(function() {
		let $this = $(this);

		$this.height($this.height());
	});

})(jQuery, document);

// alert
(($, document, undefined) => {
	let $alerts	= $('.J-admin-alerts'),
		types	= ['success', 'danger', 'info', 'warning'];

	class Alert {

		constructor(text, type, delay = 3000) {
			this.text = text;
			this.type = types[type];
			this.delay = delay;

			return this.init();
		}

		init() {
			this.render();
			this.delayClose();

			return this.$alert;
		}

		render() {
			let _this	= this;

			this.$alert = $(	'<div class="alert alert-' + this.type + ' alert-dismissible">' +
									'<button type="button" class="close"><span>&times;</span></button>' +
									this.text +
								'</div>').appendTo($alerts)
				.on('click', '.close', function() {
					_this.close();
				}).on('webkitTransitionend transitionend', function() {
					!_this.$alert.hasClass('alert-show') && _this.remove();
				});

			setTimeout(() => {
				this.$alert.addClass('alert-show');
			}, 0);
		}

		delayClose() {
			this.timer = setTimeout(() => {
				this.close();
			}, this.delay);
		}

		close() {
			clearTimeout(this.timer);
			this.$alert.removeClass('alert-show');
		}

		remove() {
			this.$alert.remove();
		}

	}

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
(($, document, undefined) => {

	$(document).on('click', '[data-delete]', function() {
		let deleted, $modal,
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
			let $fieldset	= $(this).find('fieldset').prop('disabled', true);

			$.ajax({
				url: url,
				data: $.csrf({id: id}),
				method: 'post',
				dataType: 'json',
				success: (d) => {
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
(($, document, undefined) => {

	$(document).on('uploaded.attachment.file', '.J-admin-attachment input[type=file]', function(e, d) {
		if(d.error) {
			$.alert(d.message);

			return false;
		}

		$(this).parent().attr('data-attachment-max') === undefined ? _setData.call(this, d.data) : _new.call(this, d.data);
		$.alert(d.message, d.error);
	}).on('click', '.J-admin-attachment i', function() {
		let $add, max,
			$parent	= $(this).parent();

		if($parent.hasClass('admin-attachments')) {
			$add = $parent.siblings('[data-attachment-max]');
			max = + $add.attr('data-attachment-max');
			max > 0 && $parent.siblings('.admin-attachments').length < max && $add.show();
			$parent.remove();

			return false;
		}

		$parent.find('input[type=hidden]').val('');
		$parent.find('img, i, p').remove();
	}).on('click', '[data-attachment-max]', function() {
		let $this	= $(this),
			max		= + $this.attr('data-attachment-max');

		if(max > 0 && $this.prevAll('.admin-attachments').length >= max) {
			$.alert('最多只能添加' + max + '张图片', 3);

			return false;
		}
	});

	$('.J-admin-attachment').each(function() {
		let $this	= $(this),
			$hidden	= $this.find('input[type=hidden]'),
			$file	= $this.find('input[type=file]'),
			data	= {id: $hidden.val(), name: $hidden.attr('data-name')};

		data.id && _setData.call($file.get(0), data);
		$this.hasClass('admin-attachment-name') && $this.append('<a href="javascript:;">点击上传文件</a>');
	});

	function _new(data) {
		let $this	= $(this),
			$parent	= $this.parent(),
			max		= + $parent.attr('data-attachment-max');
			$new 	= $parent.clone().removeAttr('data-attachment-max').removeClass('glyphicon-plus').addClass('glyphicon-picture admin-attachments');

		_setData.call($new.find('input[type=file]').get(0), data, true);
		$parent.before($new);
		max > 0 && $parent.siblings('.admin-attachments').length >= max && $parent.hide();
	}

	function _setData(data, isNew) {
		let $this		= $(this),
			$parent		= $this.parent(),
			$hidden		= $parent.find('input[type=hidden]'),
			$img		= $parent.find('img'),
			$text		= $parent.find('p'),
			$button		= $parent.find('a'),
			notImg		= $parent.hasClass('admin-attachment-name');

		if(!$hidden.length) {
			$hidden = $('<input type="hidden" name="' + $this.attr('data-attachment-upload') + '" />').appendTo($parent);
		}
		if(!notImg && !$img.length) {
			$img = $('<img />').appendTo($parent);
		}
		if(!$parent.find('i').length) {
			$parent.append('<i class="glyphicon glyphicon-remove"></i>');
		}
		if(notImg && !$text.length) {
			$text = $('<p></p>').appendTo($parent);
		}
		$hidden.val(data.id);
		if(notImg) {
			$hidden.attr('data-name', data.name);
			$text.html(data.name);
		} else {
			$img.attr('src', $this.attr('data-attachment-load-action') + '?id=' + data.id);
		}
		isNew && $this.remove();
	}

})(jQuery, document);
