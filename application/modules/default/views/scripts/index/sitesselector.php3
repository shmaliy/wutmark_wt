<?php 
	$lang = Zend_Registry::get('lang');
	if (Zend_Registry::isRegistered('interface')) {
		$interface = Zend_Registry::get('interface'); 
	}
?>
<div class="sitesSelect">
	<div class="container">
		<div class="title">
			<?php echo $interface["CHOOSE_SITE"][$lang]; ?>
		</div>
		<select name="sites" class="sites">
			<option value="this" selected="selected">select...</option>
			<option value="1">WUTMARC WELDING TECHNOLOGY</option>
			<option value="2">WUTMARC SPECIAL ALLOYS</option>
			<option value="3">WUTMARC STAINLESS STEEL</option>
			<option value="4">WUTMARC NONFERROUS METALS</option>
		</select>
	</div>
</div>