<?php $this->headTitle($this->item['title']); ?>

<div class="static-container">
	<div class="main-content">
		<h1><?php echo $this->item['title']; ?></h1>
		<?php echo $this->item['introtext']; ?>
		<div>
			<?php 
				if ($this->alias != 'contacts') {
					echo $this->action('index-categories-widget', 'index', 'production', array(
								'alias' => 'production'
					));
				}  
			?>
		</div>
	</div>
	<div class="widgets-container">
		<?php echo $this->action('last-news', 'new-index', 'content'); ?>
	</div>
	<div class="clear"></div>
</div>