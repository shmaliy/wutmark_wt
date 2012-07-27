/*
 * SWFUpload jQuery Plugin v1.0.0
 *
 * Copyright (c) 2009 Adam Royle
 * Licensed under the MIT license.
 *
 */

// MODIFIED

(function($){
	
	var defaultHandlers = [
		'swfupload_preload_handler',
		'swfupload_load_failed_handler',
		'swfupload_loaded_handler',
		'file_dialog_start_handler',
		'file_queued_handler',
		'file_queue_error_handler',
		'file_dialog_complete_handler',
		'upload_resize_start_handler',
		'upload_start_handler',
		'upload_progress_handler',
		'upload_error_handler',
		'upload_success_handler',
		'upload_complete_handler',
		'mouse_click_handler',
		'mouse_out_handler',
		'mouse_over_handler',
		'queue_complete_handler'
	];
	var additionalHandlers = [];
	
	$.fn.swfupload = function(){
		var args = $.makeArray(arguments);
		return this.each(function(){
			var swfu;
			if (args.length == 1 && typeof(args[0]) == 'object') {
				swfu = $(this).data('__swfu');
				if (!swfu) {
					var settings = args[0];
					var $magicUploadControl = $(this);
					var handlers = [];
					$.merge(handlers, defaultHandlers);
					$.merge(handlers, additionalHandlers);
					$.each(handlers, function(i, v){
						var eventName = v.replace(/_handler$/, '').replace(/_([a-z])/g, function(){ return arguments[1].toUpperCase(); });
						settings[v] = function() {
							var event = $.Event(eventName);
							$magicUploadControl.trigger(event, $.makeArray(arguments));
							return !event.isDefaultPrevented();
						};
					});
					
					// MOD start
					var id = $(this).attr('id');
					settings.button_placeholder_id = id + '_button';
					settings.button_width = $(this).outerWidth();
					settings.button_height = $(this).outerHeight();
					
					if ($(this).attr('upload_url')) {
						settings.upload_url = $(this).attr('upload_url');
					}
					
					// Create container if not exists
					if (!$(this).parent().find('#' + id + '_container').is('div')) {
						$('<div id="' + id + '_container' + '"><div id="' + id + '_button' + '"></div></div>').insertAfter($(this));
					}
					
					$(this).parent().css({'position': 'relative'});
					$(this).parent().find('#' + id + '_container').css({
						'position': 'absolute',
						'z-index': 1,
						'top': $(this).position().top,
						'left': $(this).position().left
					});
					// MOD end
					
					$(this).data('__swfu', new SWFUpload(settings));
				}
			} else if (args.length > 0 && typeof(args[0]) == 'string') {
				var methodName = args.shift();
				swfu = $(this).data('__swfu');
				if (swfu && swfu[methodName]) {
					swfu[methodName].apply(swfu, args);
				}
			}
		});
	};
	
	$.swfupload = {
		additionalHandlers: function() {
			if (arguments.length === 0) {
				return additionalHandlers.slice();
			} else {
				$(arguments).each(function(i, v){
					$.merge(additionalHandlers, $.makeArray(v));
				});
			}
		},
		defaultHandlers: function() {
			return defaultHandlers.slice();
		},
		getInstance: function(el) {
			return $(el).data('__swfu');
		}
	};
	
})(jQuery);