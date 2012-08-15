(function( $ ) {
	
	var container = '#latest-news-contaioner';
	
	var methods = {
		init: function () {
			$(this).newsManager('request', '/content/new-index/last-news/limit/6');	
		},
		
		request: function (url, data)
		{
			console.log('request');
			if (!data) {
				data = {format:'html'};
			}
			$(container).html('<div class="loader"></div>');
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					$(container).html(jqXHR.responseText);
				},
				complete: function(jqXHR, textStatus) {
										
				}
			});
		}
	};
	
	$.fn.newsManager = function( method ) {
  
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
	$.fn.newsManager('init');
});