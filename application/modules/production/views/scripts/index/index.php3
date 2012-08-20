<?php $this->headTitle($this->title); ?>

<div class="index-container">
	<div class="full-width">
		<?php echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		)); ?>
	</div>
	<div class="clear"></div>
</div>