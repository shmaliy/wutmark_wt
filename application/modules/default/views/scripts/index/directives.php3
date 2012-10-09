<?php 
	$lang = Zend_Registry::get('lang');
	if (Zend_Registry::isRegistered('interface')) {
		$interface = Zend_Registry::get('interface'); 
	}
?>
<div class="indexLeftColumn">
	<?php //echo $this->action('indexnews', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
	<?php echo $this->action('index-quotes', 'index', 'default', array('lang'=> Zend_Registry::get('lang'))); ?>
</div>
<div class="indexRightColumn">
	<h1><?php echo $this->items[0]['parent_title']; ?></h1>
	<div class="clear"></div>
	<?php foreach ($this->items as $item) : ?>
	<div class="directivesItemContainer">
		<div class="image"><img src="<?php echo $item['image'];?>" width="300"></div>
		<div class="text">
			<span class="textTitle">
			<?php if($item['fulltext'] != '' ) : ?>
				<a href="<?php echo $this->url(array('lang' => $lang, 'id' => $item['id']), 'newsitem');?>"><?php echo $item['title'];?></a>
			<?php else : ?>
				<?php echo $item['title'];?>
			<?php endif; ?>
			</span>
			<span class="textBody"><?php echo $item['introtext']; ?></span>			
		</div>
		<div class="clear"></div>
	</div>	
	<?php endforeach; ?>
</div>
<div class="clear"></div>