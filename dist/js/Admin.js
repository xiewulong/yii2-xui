'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/*!
 * admin
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2016/8/2
 * version: 0.0.2
 */

// csrf
(function ($, document, undefined) {
	var param = $('meta[name=csrf-param]').attr('content'),
	    token = $('meta[name=csrf-token]').attr('content');

	$.csrf = function (data) {
		data = data || {};
		data[param] = token;

		return data;
	};
})(jQuery, document);

// modal
(function ($, document, undefined) {

	$.modal = function (html, options) {
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

		return $(html).modal($.extend({ backdrop: 'static' }, options)).on('shown.bs.modal', function () {
			$(this).find('[autofocus=autofocus]').focus();
		}).on('hidden.bs.modal', function () {
			$(this).remove();
		});
	};
})(jQuery, document);

// dropdown
(function ($, document, undefined) {

	$(document).on('click', '.J-admin-header .menu > ul.main > li > .text', function () {
		var $li = $(this).parent('li');

		if (!$li.hasClass('dropdown-hover') && $li.find('ul.dropdown, ul.dropdown-mixed').length) {
			$li.toggleClass('dropdown-open');

			return false;
		}
	}).on('click', function () {
		$('.J-admin-header .menu > ul.main > li.dropdown-open').removeClass('dropdown-open');
	});
})(jQuery, document);

// sidebar
(function ($, document, undefined) {

	$(document).on('click', '.J-admin-sidebar .sidebar-control', function () {
		$(this).parents('.J-admin-sidebar').toggleClass('admin-sidebar-fold');
	}).on('click', '.J-admin-sidebar ul.sidebar > li > .text', function () {
		var $li = $(this).parent('li');

		$li.children('ul.children').length && $li.toggleClass('fold');
	});

	$('.J-admin-sidebar ul.sidebar > li > ul.children').each(function () {
		var $this = $(this);

		$this.height($this.height());
	});
})(jQuery, document);

// alert
(function ($, document, undefined) {
	var $alerts = $('.J-admin-alerts'),
	    types = ['success', 'danger', 'info', 'warning'];

	var Alert = function () {
		function Alert(text, type) {
			var delay = arguments.length <= 2 || arguments[2] === undefined ? 3000 : arguments[2];

			_classCallCheck(this, Alert);

			this.text = text;
			this.type = types[type];
			this.delay = delay;

			return this.init();
		}

		_createClass(Alert, [{
			key: 'init',
			value: function init() {
				this.render();
				this.delayClose();

				return this.$alert;
			}
		}, {
			key: 'render',
			value: function render() {
				var _this2 = this;

				var _this = this;

				this.$alert = $('<div class="alert alert-' + this.type + ' alert-dismissible">' + '<button type="button" class="close"><span>&times;</span></button>' + this.text + '</div>').appendTo($alerts).on('click', '.close', function () {
					_this.close();
				}).on('webkitTransitionend transitionend', function () {
					!_this.$alert.hasClass('alert-show') && _this.remove();
				});

				setTimeout(function () {
					_this2.$alert.addClass('alert-show');
				}, 0);
			}
		}, {
			key: 'delayClose',
			value: function delayClose() {
				var _this3 = this;

				this.timer = setTimeout(function () {
					_this3.close();
				}, this.delay);
			}
		}, {
			key: 'close',
			value: function close() {
				clearTimeout(this.timer);
				this.$alert.removeClass('alert-show');
			}
		}, {
			key: 'remove',
			value: function remove() {
				this.$alert.remove();
			}
		}]);

		return Alert;
	}();

	$.alert = function (text, type, delay) {
		if (type === undefined || type === true) {
			type = 1;
		} else if (type === false) {
			type = 0;
		}

		return new Alert(text, type, delay);
	};
})(jQuery, document);

// delete modal
(function ($, document, undefined) {

	$(document).on('click', '[data-delete]', function () {
		var deleted = void 0,
		    $modal = void 0,
		    $this = $(this),
		    id = $this.attr('data-delete'),
		    url = $this.attr('href') || $this.attr('data-url');

		if (!id || !url) return;

		$modal = $.modal('<div class="modal fade">' + '<div class="modal-dialog">' + '<form class="modal-content">' + '<fieldsed>' + '<div class="modal-header">' + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + '<h5 class="modal-title">删除提示</h5>' + '</div>' + '<div class="modal-body">' + '<p>您确定要删除吗？</p>' + '</div>' + '<div class="modal-footer">' + '<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>' + '<button type="submit" class="btn btn-primary">确定</button>' + '</div>' + '</fieldsed>' + '</form>' + '</div>' + '</div>');

		$modal.on('submit', 'form', function () {
			var $fieldset = $(this).find('fieldset').prop('disabled', true);

			$.ajax({
				url: url,
				data: $.csrf({ id: id }),
				method: 'post',
				dataType: 'json',
				success: function success(d) {
					if (!d.error) {
						deleted = true;
					}
					$modal.modal('hide');
					$.alert(d.message, d.error);
				}
			});

			return false;
		}).on('hidden.bs.modal', function () {
			deleted && window.location.reload();
		});

		return false;
	});
})(jQuery, document);

// attachment upload
(function ($, document, undefined) {

	$(document).on('uploaded.attachment.file', '.J-admin-attachment input[type=file]', function (e, d) {
		if (d.error) {
			$.alert(d.message);

			return false;
		}

		$(this).parent().attr('data-attachment-max') === undefined ? _setData.call(this, d.data) : _new.call(this, d.data);
		$.alert(d.message, d.error);
	}).on('click', '.J-admin-attachment i', function () {
		var $add = void 0,
		    max = void 0,
		    $parent = $(this).parent();

		if ($parent.hasClass('admin-attachments')) {
			$add = $parent.siblings('[data-attachment-max]');
			max = +$add.attr('data-attachment-max');
			max > 0 && $parent.siblings('.admin-attachments').length < max && $add.show();
			$parent.remove();

			return false;
		}

		$parent.find('input[type=hidden]').val('');
		$parent.find('img, i, p').remove();
	}).on('click', '[data-attachment-max]', function () {
		var $this = $(this),
		    max = +$this.attr('data-attachment-max');

		if (max > 0 && $this.prevAll('.admin-attachments').length >= max) {
			$.alert('最多只能添加' + max + '张图片', 3);

			return false;
		}
	});

	$('.J-admin-attachment').each(function () {
		var $this = $(this),
		    $hidden = $this.find('input[type=hidden]'),
		    $file = $this.find('input[type=file]'),
		    data = { id: $hidden.val(), name: $hidden.attr('data-name') };

		data.id && _setData.call($file.get(0), data);
		$this.hasClass('admin-attachment-name') && $this.append('<a href="javascript:;">点击上传文件</a>');
	});

	function _new(data) {
		var $this = $(this),
		    $parent = $this.parent(),
		    max = +$parent.attr('data-attachment-max'),
		    $new = $parent.clone().removeAttr('data-attachment-max').removeClass('glyphicon-plus').addClass('glyphicon-picture admin-attachments');

		_setData.call($new.find('input[type=file]').get(0), data, true);
		$parent.before($new);
		max > 0 && $parent.siblings('.admin-attachments').length >= max && $parent.hide();
	}

	function _setData(data, isNew) {
		var $this = $(this),
		    $parent = $this.parent(),
		    $hidden = $parent.find('input[type=hidden]'),
		    $img = $parent.find('img'),
		    $text = $parent.find('p'),
		    $button = $parent.find('a'),
		    notImg = $parent.hasClass('admin-attachment-name');

		if (!$hidden.length) {
			$hidden = $('<input type="hidden" name="' + $this.attr('data-attachment-upload') + '" />').appendTo($parent);
		}
		if (!notImg && !$img.length) {
			$img = $('<img />').appendTo($parent);
		}
		if (!$parent.find('i').length) {
			$parent.append('<i class="glyphicon glyphicon-remove"></i>');
		}
		if (notImg && !$text.length) {
			$text = $('<p></p>').appendTo($parent);
		}
		$hidden.val(data.id);
		if (notImg) {
			$hidden.attr('data-name', data.name);
			$text.html(data.name);
		} else {
			$img.attr('src', $this.attr('data-attachment-load-action') + '?id=' + data.id);
		}
		isNew && $this.remove();
	}
})(jQuery, document);

// tags
(function ($, document, undefined) {
	var Tags = function () {
		function Tags(obj) {
			var _this4 = this;

			_classCallCheck(this, Tags);

			this.$obj = $(obj);
			this.$list = this.$obj.find('p');
			this.$new = this.$obj.find('.new');
			this.$button = this.$new.find('button');
			this.url = this.$obj.attr('data-tags');
			this.name = this.$button.attr('data-tag-name');
			this.inputTemplate = '<input type="text" class="form-control" placeholder="请输入标签名" />';
			this.ids = function () {
				var ids = [];
				_this4.$list.find('span input[type=hidden]').each(function () {
					ids.push(+this.value);
				});

				return ids;
			}();

			this.events();
		}

		_createClass(Tags, [{
			key: 'events',
			value: function events() {
				var _this5 = this;

				var _this = this;
				this.$obj.on('click', '.new button', function () {
					_this5.newInput();
					_this5.$button.hide();
					_this5.$input.appendTo(_this5.$new).focus();
				}).on('keydown', '.new input', function (e) {
					switch (e.originalEvent.keyCode) {
						case 13:
							return _this5.submit();
							break;
						case 27:
							_this5.cancel();
							break;
						case 38:
							_this5.press(false);
							break;
						case 40:
							_this5.press(true);
							break;
					}
				}).on('focus input', '.new input', function () {
					_this5.like();
				}).on('click', 'p span i', function () {
					var $span = $(this).parent('span'),
					    index = _this.ids.indexOf(+$span.find('input[type=hidden]').val());

					index >= 0 && _this.ids.splice(index, 1);

					$span.fadeOut(function () {
						$span.remove();
					});
				});

				$(document).on('click', function () {
					_this5.clearDropdown();
				});
			}
		}, {
			key: 'unselect',
			value: function unselect() {
				this.selectedId = null;
			}
		}, {
			key: 'select',
			value: function select($target) {
				this.selectedId = $target.addClass('selected').attr('data-id');
			}
		}, {
			key: 'press',
			value: function press(down) {
				if (!this.$dropdown) return;

				var $target = void 0,
				    classname = 'selected',
				    sibling = down ? 'next' : 'prev',
				    $selected = this.$dropdown.find('li.' + classname),
				    $first = this.$dropdown.find('li:' + (down ? 'first' : 'last'));

				if ($selected.length) {
					$selected.removeClass(classname);

					if ($selected[sibling]('li').length) {
						$target = $selected[sibling]('li');
					} else {
						$target = $first;
					}
				} else {
					$target = $first;
				}

				this.select($target);
			}
		}, {
			key: 'clearDropdown',
			value: function clearDropdown() {
				if (!this.$dropdown) return;

				this.$dropdown.remove();
				this.$dropdown = null;
				this.pressDownIndex = 0;
				this.unselect();
			}
		}, {
			key: 'dropdown',
			value: function dropdown(tags) {
				var len = tags.length;

				if (!len) {
					this.clearDropdown();

					return;
				}

				this.unselect();

				var tag = void 0,
				    list = [],
				    css = this.$input.offset(),
				    value = this.$input.val(),
				    _this = this;

				css.top += this.$input.get(0).offsetHeight;

				this.$dropdown = this.$dropdown || $('<ul class="admin-tags-like-list">').appendTo('body').on('click', 'li', function () {
					_this.addById($(this).attr('data-id'));
				}).on('mouseenter', 'li', function () {
					_this.selectedId = $(this).addClass('selected').siblings('.selected').removeClass('selected').end().attr('data-id');
				});
				this.$dropdown.css(css);

				this.tags = {};

				for (var i = 0; i < len; i++) {
					tag = tags[i];
					if (this.exists(tag.id)) continue;
					var current = tag.name == value;
					list.push('<li data-id="' + tag.id + '"' + (current ? ' class="selected"' : null) + '>' + tag.name + '</li>');
					this.tags[tag.id] = tag;
					if (current) {
						this.selectedId = tag.id;
					}
				}

				this.$dropdown.html(list.join(''));
			}
		}, {
			key: 'like',
			value: function like() {
				this.selected = null;

				this.$input.val() ? this.post(true) : this.clearDropdown();
			}
		}, {
			key: 'add',
			value: function add(tag) {
				if (this.exists(tag.id)) {
					this.$input.prop('disabled', false);
					$.alert('标签已添加', 3);

					return;
				}

				this.ids.push(tag.id);
				this.$list.append('<span>' + '<input type="hidden" name="' + this.name + '" value="' + tag.id + '" />\n' + '<strong>' + tag.name + '</strong>\n' + '<i class="glyphicon glyphicon-remove"></i>\n' + '</span>');
				this.cancel();
			}
		}, {
			key: 'exists',
			value: function exists(id) {
				return $.inArray(id, this.ids) >= 0;
			}
		}, {
			key: 'addById',
			value: function addById(id) {
				this.tags[id] && this.add(this.tags[id]);
			}
		}, {
			key: 'submit',
			value: function submit() {
				if (this.selectedId) {
					this.addById(this.selectedId);
				} else if (this.$input.val()) {
					this.$input.prop('disabled', true);
					this.post();
				} else {
					$.alert('请输入标签名', 3);
				}

				return false;
			}
		}, {
			key: 'cancel',
			value: function cancel() {
				this.$input.remove();
				this.$button.show();
				this.clearDropdown();
			}
		}, {
			key: 'newInput',
			value: function newInput() {
				this.$input = $(this.inputTemplate);
			}
		}, {
			key: 'post',
			value: function post(like) {
				var _this6 = this;

				$.ajax({
					url: this.url,
					data: $.csrf({
						name: this.$input.val(),
						like: like
					}),
					method: 'post',
					dataType: 'json',
					success: function success(d) {
						if (d.error) {
							return;
						}
						_this6[like ? 'dropdown' : 'add'](d.data);
					}
				});
			}
		}]);

		return Tags;
	}();

	$('[data-tags]').each(function () {
		new Tags(this);
	});
})(jQuery, document);
//# sourceMappingURL=Admin.js.map
