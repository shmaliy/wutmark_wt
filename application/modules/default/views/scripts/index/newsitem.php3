<div class="indexLeftColumn">
	<?php echo $this->action('indexnews', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
	<?php echo $this->action('index-quotes', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
</div>
<div class="indexRightColumn">
	<h1><?php echo $this->item['parent_title'] . ' / ' . $this->item['title']; ?></h1>
	<div><?php echo $this->item['fulltext']; ?></div>
</div>
<div class="clear"></div>