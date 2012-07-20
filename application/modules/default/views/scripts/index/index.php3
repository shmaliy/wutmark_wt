<?php echo $this->action('directivesslider', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
<div class="clear"></div>
<div class="indexLeftColumn">
	<?php echo $this->action('indexnews', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
	<?php echo $this->action('index-quotes', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
</div>
<div class="indexRightColumn">
	<?php echo $this->action('seo', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
	<?php echo $this->action('indexpartners', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
</div>
<div class="clear"></div>