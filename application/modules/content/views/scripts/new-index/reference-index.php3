<?php $this->headTitle($this->title); ?>

<div class="index-container">
	<div class="left">
		<h1><?php echo $this->title; ?></h1>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-news', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		)); ?>
	</div>
	
</div>