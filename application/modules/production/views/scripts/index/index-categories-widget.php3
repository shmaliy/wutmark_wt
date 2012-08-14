<div class="plashka-top">
	<a class="tab-native" id="tab-native" onclick="$.fn.catWidget('tabNative');"><span><?php echo OUR_PRODUCTION_TITLE;?></span></a>
	<a class="tab-concurents" id="tab-concurents" onclick="$.fn.catWidget('tabConcurents');"><span><?php echo CONCURENTS_SELECT_TITLE;?></span></a>
	<div class="clear"></div>
</div>
<div class="plashka-middle">
	<div class="wrapper">
		<div id="native-categories">
			<ul class="root">
			<?php foreach ($this->items as $item) : ?>
				<li>
					<a href="<?php echo $this->root . '/' . $item['title_alias']; ?>"><?php echo $item['title'];?></a>
					<?php if (!empty($item['childs'])) : ?>
						<ul class="child">
						<?php foreach ($item['childs'] as $child) : ?>
							<li><a href="<?php echo $this->root . '/' . $item['title_alias'] . '/' . $child['title_alias']; ?>"><?php echo $child['title'];?></a></li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>	
			</ul>
		</div>
		<div id="concurents"><?php echo $this->action('index-select-by-outer-brand', 'index', 'production'); ?></div>
	</div>
</div>
<div class="plashka-bottom"></div>

<script>
(function( $ ) {
	
	var nativeTab = '#tab-native';
	var concurentsTab = '#tab-concurents';

	var nativeField = '#native-categories';
	var concurentsField = '#concurents';
	
	var methods = {
		init: function () {
			$(nativeTab).removeClass('tab-native').addClass('tab-native-active');	
			$(concurentsField).css('display', 'none');
			return false;
		},

		tabNative: function () {
			$(nativeTab).removeClass('tab-native').addClass('tab-native-active');	
			$(concurentsTab).removeClass('tab-concurents-active').addClass('tab-concurents');
			$(concurentsField).css('display', 'none');
			$(nativeField).css('display', 'block');
			return false;
		},

		tabConcurents: function () {
			$(nativeTab).removeClass('tab-native-active').addClass('tab-native');	
			$(concurentsTab).removeClass('tab-concurents').addClass('tab-concurents-active');
			$(nativeField).css('display', 'none');
			$(concurentsField).css('display', 'block');
			return false;
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
	$.fn.catWidget('init');
});
</script>