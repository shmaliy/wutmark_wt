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
		<?php echo $this->form;?>
	</div>
</div>