<?php echo $this->title; ?>

<?php echo $this->partial('index-categories-widget-partial.php3', 'production', array(
	'items' => $this->items,
	'root' => $this->root
)); ?>
