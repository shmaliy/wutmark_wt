<h2><?php echo $this->title; ?></h2>

<?php echo $this->partial('index-categories-widget-partial.php3', 'production', array(
	'items' => $this->items,
	'root' => $this->root
)); ?>
