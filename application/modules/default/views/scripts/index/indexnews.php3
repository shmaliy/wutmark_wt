<?php 
	$lang = Zend_Registry::get('lang');
	if (Zend_Registry::isRegistered('interface')) {
		$interface = Zend_Registry::get('interface'); 
	}
?>
<div class="indexNews">
	<div class="title"><?php echo $this->items[0]['parent_title']; ?></div>
	<div class="clear"></div>
	<?php foreach ($this->items as $item) : ?>
	<div class="itemContainer">
		<div class="image"><img src="<?php echo $item['image'];?>"></div>
		<div class="text">
			<span class="textTitle">
			<?php if($item['fulltext'] != '' ) : ?>
				<a href="/news/1/<?php echo $item['id']; ?>"><?php echo $item['title'];?></a>
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

