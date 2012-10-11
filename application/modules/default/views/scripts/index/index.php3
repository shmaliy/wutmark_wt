<div class="index-container">
	<div class="flash-presentation"><?php echo $this->action(
										'flash-presentation', 
										'index', 
										'default', 
										array('cat' => 'areas_of_use')
		); ?></div>
	<div class="left">
		<?php echo $this->action('seo', 'index', 'default', array(
			'alias' => 'seo'
		)); ?>
	</div>
	<div class="right">
		<?php echo $this->action('last-news', 'new-index', 'content'); ?>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		)); ?>
	</div>
</div>