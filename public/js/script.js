// Javascript main file

// redirect - строка, перенаправляет на указанный адрес
// update - строка, div.body-container (по умолчанию), либо указанный блок
// append - строка, дописывает ответ в указанный блок
// prepend - строка, дописывает ответ в начало указанного блока
// exception - объект, обработка исключений



(function( $ ) {
	
	var methods = {
		init: function () {
				
		},
		
		parseFlashResponse: function (serverData) {
			if (!serverData) {
				return;
			}
			
			var response = $.parseJSON(serverData);
			
			if(response !== null) {
				if (response.action) {
					var method = 'response_' + response.action;
					$(this).cmsManager(method, response);
				}
			}
		},
		
		parseHttpResponse: function (jqXHR) 
		{
			var contentType = jqXHR.getResponseHeader('Content-Type');	
			if (contentType == 'application/json') {
				var response = $.parseJSON(jqXHR.responseText);
				
				if (response.action) {
					var method = 'response_' + response.action;
					$(this).cmsManager(method, response);
				}
			}
		},
		
		response_update: function (response) {
			console.log(response);
			if (!response.sourceUrl || response.sourceUrl !=1) {
				var url = '/' + response.update_m + '/' + response.update_c + '/' + response.update_a;
				var content = {format: 'html'};
			
				$.ajax({
					url: url,
					data: content,
					type: 'POST',
					error: function(jqXHR, textStatus, errorThrown) {},
					
					success: function(data, textStatus, jqXHR) {
						var modal = $(document).find('.ui-dialog-content-container');
						if (modal.length > 0) {
							$(document).find('.ui-dialog-content-container').html(data);
						} else {
							$(document).find('.body-container').html(data);
						}
						
						$('.via_ajax').cmsManager('observe');
						
						uploader();
					},
					
					complete: function(jqXHR, textStatus) {}
				});		
			} else {
				window.location = response.redirectTo;
			}
			
		},
		
		observe: function()
		{
			return this.each(function(){
				var action = null;
				var attr   = null;
				
				if ($(this).is('a')) {
					action = 'click';
					attr   = 'href';
				} else if ($(this).is('form')) {
					action = 'submit';
					attr   = 'action';
				}
				
				$(this).serialize();
				
				if (action === null) {
					$.error( "Can't observe selected tags" );
				}
				
				$(this).bind(action, function(event){
					event.preventDefault();
					
					var data   = {};
					if (action == 'submit') {
						data = $(this).serialize();
					}
					
					$(this).cmsManager('request', $(this).attr(attr), data);
				});
			});
		},
		
		request: function (url, data)
		{
			if (!data) {
				data = '';
			}
			
			if (typeof url != 'string') {
				$.error( 'Url passed in to "request" must be a string!' );
			}
			
			if (typeof data != 'string' && !$.isPlainObject(data)) {
				$.error( 'Data passed in to "request" must be a string or isPlainObject!' );
			}
			
			//alert(typeof data);
			
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					$(this).cmsManager('parseHttpResponse', jqXHR);
				},
				success: function(data, textStatus, jqXHR) {
					$(this).cmsManager('parseHttpResponse', jqXHR);
				},
				complete: function(jqXHR, textStatus) {
				
				}
			});
		},
		
		mainImageFormSelector: function (value, hidden_id, wId)
		{
			$('#' + hidden_id).attr('value', value);
			$(this).cmsManager('mainImageRenderer', value);
			wId.dialog('close');
		},
		
		mainImageRenderer: function (id)
		{
			var url = '/media/admin-index/render-form-main-image/imgId/' + id; 
			//alert(id);
			$.ajax({
				url: url,
				//data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					//$(this).cmsManager('parseHttpResponse', jqXHR);
				},
				success: function(data, textStatus, jqXHR) {
					//$(this).cmsManager('parseHttpResponse', jqXHR);
					var response = $.parseJSON(jqXHR.responseText);
					var file = response.file;
					$('.media_id-list').append('<li id="result-list-item-' + id + '"><img src="' + file + '" width="150" height="150"></li>');
				},
				complete: function(jqXHR, textStatus) {
				
				}
			});
		}
	};
	
	$.fn.cmsManager = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );



$(document).ready(function(){
	//observeFormOnSubmit();
	//observeAnchorOnClick();

	$('.via_ajax').cmsManager('observe');
});

// Observe generic menu class toggle
$(document).ready(function(){
	$('ul.generic-menu li, tr').each(function(){
		$(this).hover(
			function(){ $(this).addClass("hover"); },
			function(){ $(this).removeClass("hover"); }
		);
	});
});

// Observe table checkbox
$(document).ready(function(){
	function toggleActions()
	{
		var cbChecked = $('.admin-table table tr input[type=checkbox]:checked');
		if (cbChecked.length > 0) {
			$('.admin-actions .single').hide();
			$('.admin-actions .multi').show();
		} else {
			$('.admin-actions .single').show();
			$('.admin-actions .multi').hide();
		}
		
	}
	
	var cbAll = $('.admin-table table th input[type=checkbox]');
	var cbRow = $('.admin-table table tr input[type=checkbox]');
	
	cbAll.change(function(){
		var checked = cbAll.attr('checked');
		if (checked) {
			cbRow.attr('checked', checked);
		} else {
			cbRow.attr('checked', false);
		}
		
		toggleActions();
	});
	
	cbRow.change(function(){ toggleActions(); });
});

// Flash messenger
$(document).ready(function(){
	function hidePreviousFlashMessage(div)
	{
		//alert('hide');
		$(div).slideUp(400, function(){
			var next = $(div).next();
			$(div).remove();
			
			setTimeout(function(){
				hidePreviousFlashMessage(next);
			}, 1500);
		});
	}
	
	function showNextFlashMessage(div)
	{
		$(div).css({opacity: 0});
		$(div).animate(
			{opacity: 1, height: 'toggle'},
			400,
			function(){
				var next = $(div).next();
				if (next.is('div')) {
					showNextFlashMessage($(div).next());
				} else {
					setTimeout(function(){
						hidePreviousFlashMessage($('.flash-messenger-messages div').first());
					}, 5000);
				}
			}
		);
	}
	
	showNextFlashMessage($('.flash-messenger-messages div').first());
});

function uploader()
{
	var swfuploadOptions = {
			upload_url: "upload.php",
			file_post_name : "upload",
			file_size_limit : "2GB",
			file_types : "*.*",
			button_placeholder_container_id: "",
			file_types_description : "All Files",
			file_upload_limit : "0",
			flash_url : "/js/jquery/jquery.swfupload/swfupload.swf",
			button_image_url : '/js/jquery/jquery.swfupload/swfupload.png',
			button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_action : SWFUpload.BUTTON_ACTION.SELECT_FILE,
			debug: true,
			custom_settings : {something : "here"}
		};
		
		var su = $('.swfupload-button').swfupload(swfuploadOptions);
		
		su.bind('swfuploadLoaded', function(event){
			//$('#log').append('<li>Loaded</li>');
			console.log('Loaded');
		});
		
		su.bind('fileQueued', function(event, file){
			//$('#log').append('<li>File queued - '+file.name+'</li>');
			console.log('File queued - ' + file.name);
			
			// start the upload since it's queued
			var progress = $(
				'<div class="swfupload-progress"><div class="swfupload-file-title">' + file.name + '</div><div class="swfupload-progress-bar"></div></div>'
			);
			progress.dialog({
				modal: true,
				resizable: false,
				title: "Загрузка...",
				width: 400,
				height: 150,
				beforeClose: function(event, ui) {
					$.swfupload.getInstance(su).cancelUpload();
				}
			});
			
			progress.find('.swfupload-progress-bar').progressbar({value: 0});
			
			su.data('__bar', progress);
			$(this).swfupload('startUpload');
		});
		
		su.bind('fileQueueError', function(event, file, errorCode, message){
			//$('#log').append('<li>File queue error - '+message+'</li>');
			console.log('File queue error - ' + message);
		});
		
		su.bind('fileDialogStart', function(event){
			//$('#log').append('<li>File dialog start</li>');
			console.log('File dialog start');
		});
		
		su.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
			//$('#log').append('<li>File dialog complete</li>');
			console.log('File dialog complete');
		});
		
		su.bind('uploadStart', function(event, file){
			//$('#log').append('<li>Upload start - '+file.name+'</li>');
			console.log('Upload start - ' + file.name);
		});
		
		su.bind('uploadProgress', function(event, file, bytesLoaded, bytesTotal){
			//$('#log').append('<li>Upload progress - '+bytesLoaded+'</li>');
			//console.log('Upload progress - ' + bytesLoaded);
			
			progress = su.data('__bar');
			progress.find('.swfupload-progress-bar').progressbar("value" , Math.ceil(bytesLoaded/bytesTotal*100));
		});
		
		su.bind('uploadSuccess', function(event, file, serverData){
			//$('#log').append('<li>Upload success - '+file.name+'</li>');
			console.log('Upload success - ' + file.name);
			$('.via_ajax').cmsManager('parseFlashResponse', serverData);
			eval('var json = ' + serverData);
			
			if (json.success === true) {
				progress = su.data('__bar');
				progress.dialog("close");
				progress.dialog("destroy");
				
				if (json.redirectTo != '') {
					//window.location.href = json.redirectTo;
				}
			}
		});
		
		su.bind('uploadComplete', function(event, file){
			//$('#log').append('<li>Upload complete - '+file.name+'</li>');
			console.log('Upload complete - ' + file.name);
			
			// upload has completed, lets try the next one in the queue
			$(this).swfupload('startUpload');
		});
		
		su.bind('uploadError', function(event, file, errorCode, message){
			//$('#log').append('<li>Upload error - '+message+'</li>');
			console.log('Upload error - ' + message);
			
			progress = su.data('__bar');
			progress.html('<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding:0 .7em"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>Ошибка загрузки.</p></div></div>');
		});
}


//Observe generic menu class toggle
$(document).ready(function(){
	uploader();
});

function deleteItem(url, id)
{
	$.ajax({
		url: url,
		data: {'id': id},
		dataType: "json",
		type: 'POST',
		error: function(jqXHR, textStatus, errorThrown) {
			parseResponse(jqXHR);
		},
		success: function(data, textStatus, jqXHR) {
			parseResponse(jqXHR);
		},
		complete: function(jqXHR, textStatus) {
			parseResponse(jqXHR);
			window.location.href = window.location.href;
		}
	});
	
	return false;
}

