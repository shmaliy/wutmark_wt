// Observe generic menu class toggle
var wCount = 0;
var wIncrement = 0;

function uiDialogOpen(title, content)
{
	if (wCount == 0) {
		$('body').append('<div class="ui-widget-overlay" style="z-index: 1001;" id="ui-dialog-collection-overlay"></div>');
	}
	
	if (!title) {
		title = 'Untitled window';
	}
	
	if ($.isPlainObject(content)) {
		var module     = content.module ? content.module : 'default';
		var controller = content.controller ? content.controller : 'index';
		var action     = content.action ? content.action : 'index';
		var url = '/' + module + '/' + controller + '/' + action;
		
		var wrapper = uiDialogShow(title, '');
		$.ajax({
			url: url,
			data: content,
			//dataType: "json",
			type: 'POST',
			error: function(jqXHR, textStatus, errorThrown) {
				//console.log(errorThrown);
			},
			success: function(data, textStatus, jqXHR) {
				//console.log(data);
				wrapper.find('.ui-dialog-content-container').html(data);
			},
			complete: function(jqXHR, textStatus) {
				//console.log(jqXHR);
				$('.via_ajax').cmsManager('observe');
				uploader();
			}
		});		
	} else {
		if (!content) {
			content = '';
		}
		
		uiDialogShow(title, content);
	}
}

function uiDialogShow(title, content)
{
	var wrapper = $('<div class="ui-dialog-content-wrapper" id="ui-dialog-content-wrapper' + wIncrement + '"></div>').append(
		$('<div class="ui-dialog-content-container" id="ui-dialog-content-container' + wIncrement + '"></div>').html(content)
	);
	
	wrapper.dialog({
		modal: false,
		resizable: false,
		title: title,
		width: 900,
		height: 600,
		beforeClose: function(event, ui) {
			wCount--;
			if (wCount == 0) {
				$('#ui-dialog-collection-overlay').remove();
			}
		}
	});
	
	wIncrement++;
	wCount++;
	return wrapper;
}