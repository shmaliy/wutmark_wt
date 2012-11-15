<div class="index-support">
	<div class="img"></div>
	<div class="container">
		<div class="title"><?php echo CUSTOMER_SUPPORT_INDEX_TITLE; ?></div>
		<div class="text">
			<?php $text = str_replace('*lang*', Zend_Registry::get('lang'), CUSTOMER_SUPPORT_INDEX_TEXT); ?>
			<?php echo $text; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>