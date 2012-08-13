<h2><?php echo $this->title; ?></h2>



<div class="plashka-top"></div>
<div class="plashka-middle">
	<div class="wrapper">
		<div id="native-categories">
			<?php echo $this->partial('index-categories-widget-partial.php3', 'production', array(
				'items' => $this->items,
				'root' => $this->root,
				'class' => 'root'
			)); ?>
		</div>
	</div>
</div>
<div class="plashka-bottom"></div>

<script>
(function( $ ) {
	
	var methods = {
		init: function () {
				
		},

		start: function (container)
		{
			var catlist = $(container + ' > ul.root > li.root-child');
			var first = $(catlist + ':first-child');
			first.toggleClass('hover');
			console.log(catlist.length);
		}, 

		change: function (id)
		{
			
		}
	};
	
	$.fn.catWidget = function( method ) {
  
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
	$.fn.catWidget('start', '#native-categories');
});

</script>
