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
		
		<?php echo $this->action('index-support', 'index', 'default'); ?>
		
	</div>
	<div class="right">
		<?php echo $this->action('download-book', 'index', 'default', array('book' => 'info-book')); ?>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		)); ?>
	</div>	
	
</div>