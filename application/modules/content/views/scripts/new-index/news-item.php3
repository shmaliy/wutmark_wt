<?php $this->headTitle($this->item['title']); ?>
<div class="index-container">
	<div class="left">
		<h1><?php echo $this->item['title']; ?></h1>
		<div class="date"><?php echo POSTED_ON; ?> <?php echo date("d.m.Y", $item['created']); ?></div>
		<?php echo $this->item['fulltext']; ?>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-news', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>